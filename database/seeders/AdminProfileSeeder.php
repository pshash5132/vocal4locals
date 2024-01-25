<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::where('email', 'admin@admin.com')->first();
        $vendor = new Vendor();
        $vendor->banner = "uploads/vendor/cendor_profile.jpg";
        $vendor->name = "Admin";
        $vendor->phone = "1234567890";
        $vendor->email = "admin@gmail.com";
        $vendor->address = "USA";
        $vendor->description = "Shop Of Admin";
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
