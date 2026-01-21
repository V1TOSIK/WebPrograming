<?php
class House {
    public $price;
    public $name;
    public $address;
    public $phone;
    public $image;
    public $bedrooms;
    public $bathrooms;

    public function __construct($price, $name, $address, $phone, $image, $bedrooms, $bathrooms) {
        $this->price = $price;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->image = $image;
        $this->bedrooms = $bedrooms;
        $this->bathrooms = $bathrooms;
    }

    public function displayHouse() {
        echo "
                <div class='w-full  p-4'>
                    <div class='bg-white shadow-lg rounded-lg overflow-hidden'>
                        <img class='w-full h-48 object-cover' src='{$this->image}' alt='{$this->name}'>
                        <div class='p-4'>
                            <h3 class='text-xl font-semibold text-gray-800'>{$this->name}</h3>
                            <p class='text-gray-600'>{$this->address}</p>
                            <p class='text-gray-600'>Phone: {$this->phone}</p>
                            <p class='text-gray-600'>Bedrooms: {$this->bedrooms}</p>
                            <p class='text-gray-600'>Bathrooms: {$this->bathrooms}</p>
                            <p class='text-xl font-semibold text-gray-800 mt-2'>";
    }
}
?>