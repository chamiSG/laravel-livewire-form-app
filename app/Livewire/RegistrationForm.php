<?php

namespace App\Livewire;

use App\Services\ContactService;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RegistrationForm extends Component
{
    public $step = 1;
    public $birthDate;
    public $marriageDate;

    #[Validate('required')]
    public $firstName;

    #[Validate('required')]
    public $lastName;

    #[Validate('required')]
    public $address;

    #[Validate('required')]
    public $city;

    #[Validate('required')]
    public $country;

    #[Validate('required')]
    public $birthMonth;

    #[Validate('required')]
    public $birthDay;

    #[Validate('required')]
    public $birthYear;

    public $isMarried = false;
    public $isWidowed = false;
    public $hasBeenMarried = false;
    public $marriageMonth;
    public $marriageDay;
    public $marriageYear;
    public $marriageCountry;
    public $countryOptions;
    public $monthsOptions;
    public $daysOptions;
    public $yearsOptions;

    protected $contactService;

    public function mount()
    {
        $this->countryOptions = $this->getCounties();
        $this->monthsOptions = $this->getMonths();
        $this->daysOptions = $this->getDays();
        $this->yearsOptions = $this->getYears();
    }

    public function render()
    {
        return view('livewire.registration-form');
    }

    public function next()
    {
        $this->validate();

        $this->isMarried = ($this->isMarried) ? true : false;

        // Combine birth date fields into a single date-time string
        $this->birthDate = $this->birthYear . '-' . $this->birthMonth . '-' . $this->birthDay;
        // Check if marriage occurred before the user was 18 years old
        if (Carbon::parse($this->birthDate)->diffInYears(Carbon::now()) < 18) {
            $this->addError('birthDate', 'You are not eligible to apply because your age occurred before 18th.');
            return;
        }

        $this->step++;

        $this->dispatch('updateFormStatus', $this->step, $this->getCurrentStatus());
    }

    public function previous()
    {
        $this->step--;
        $this->dispatch('updateFormStatus', $this->step, $this->getCurrentStatus());
    }

    public function store()
    {
        if ($this->isMarried) {
            $this->validate([
                'marriageMonth' => 'required',
                'marriageDay' => 'required',
                'marriageYear' => 'required',
                'marriageCountry' => 'required',
            ]);

            // Combine marriage date fields into a single date-time string
            $this->marriageDate = $this->marriageYear . '-' . $this->marriageMonth . '-' . $this->marriageDay;

            // Check if marriage occurred before the user was 18 years old
            if (Carbon::parse($this->marriageDate)->diffInYears(Carbon::parse($this->birthDate)) < 18) {
                $this->addError('marriageDate', 'You are not eligible to apply because your marriage occurred before your 18th birthday.');
                return;
            }
        } else {
            $this->validate([
                'isWidowed' => 'required',
                'hasBeenMarried' => 'required',
            ]);
        }

        $validatedData = [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'birth_date' => $this->birthDate,
            'is_married' => $this->isMarried,
            'marriage_date' => $this->marriageDate,
            'marriage_country' => $this->marriageCountry,
            'is_widowed' => $this->isWidowed,
            'has_been_married' => $this->hasBeenMarried,
        ];

        $contactService = app(ContactService::class);
        $data = $contactService->create($validatedData);

        session()->flash('status', 'Contact successfully created!');

        return redirect()->route('success', ['id' => $data->id]);
    }


    public function getCurrentStatus()
    {
        $data = [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'birthMonth' => $this->birthMonth,
            'birthDay' => $this->birthDay,
            'birthYear' => $this->birthYear,
            'isMarried' => $this->isMarried,
            'marriageDate' => $this->marriageDate,
            'marriageMonth' => $this->marriageMonth,
            'marriageDay' => $this->marriageDay,
            'marriageYear' => $this->marriageYear,
            'marriageCountry' => $this->marriageCountry,
            'isWidowed' => $this->isWidowed,
            'hasBeenMarried' => $this->hasBeenMarried,
        ];

        return $data;
    }

    // TODO: We can make these function as Helper function in future, but skip for now.
    public function getCounties()
    {
        $filePath = public_path('json/country.json'); // path to JSON file
        $jsonString = file_get_contents($filePath); // read the file into a string
        return json_decode($jsonString, true); // decode the JSON string into an associative array
    }

    public function getMonths()
    {
        $months = array([
            'label' => '-',
            'value' => '',
        ]);

        for ($m = 1; $m <= 12; $m++) {
            $month = Carbon::parse('2024-' . $m . '-01')->monthName;
            array_push($months, [
                'label' => $month,
                'value' => $m,
            ]);
        }

        return $months;
    }

    public function getDays()
    {
        $days = array([
            'label' => '-',
            'value' => '',
        ]);

        for ($d = 1; $d <= 31; $d++) {
            array_push($days, [
                'label' => sprintf('%02d', $d),
                'value' => sprintf('%02d', $d),
            ]);
        }

        return $days;
    }

    public function getYears()
    {
        $years = array([
            'label' => '-',
            'value' => '',
        ]);

        for ($y = date('Y'); $y >= 1900; $y--) {
            array_push($years, [
                'label' => $y,
                'value' => $y,
            ]);
        }

        return $years;
    }
}
