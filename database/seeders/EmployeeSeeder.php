<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Company;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        // Create dummy companies
        $companies = [];
        for ($i = 0; $i < 10; $i++) {
            $companies[] = Company::create([
                'name' => $faker->company,
                'email' => $faker->companyEmail,
                'logo' => 'company_logo.png',
                'website' => $faker->url,
            ]);
        }

        // Create 20 random employees
        for ($i = 0; $i < 20; $i++) {
            $company = $faker->randomElement($companies);
            Employee::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'company_id' => $company->id,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}
