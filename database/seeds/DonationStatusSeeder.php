<?php

use Illuminate\Database\Seeder;
use App\DonationStatus;

class DonationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_array = [
            DonationStatus::STATUS_CREATING,
            DonationStatus::STATUS_PENDING, 
            DonationStatus::STATUS_ACCEPTED,
            DonationStatus::STATUS_FINISHED,
            DonationStatus::STATUS_CANCELED,
            DonationStatus::STATUS_REJECTED,
        ];

        foreach ($status_array as $status) {
            $donation_status = new DonationStatus;
            $donation_status->status = $status;
            $donation_status->save();
        }
    }
}
