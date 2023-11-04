<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyOwnerSeeder extends Seeder
{
    /**s
     * Run the database seeds.
     */
    public function run()
    {
        $count = 50;

        for ($i = 1; $i <= $count; $i++) {
            DB::table('company_owner')->insert([
                'company_id' => Company::all()->random()->id,
                'owner_id' => Owner::all()->random()->id,
            ]);
        }
    }
}
