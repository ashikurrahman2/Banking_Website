<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->string('loan_type');
            $table->string('F_name');
            $table->string('M_name');
            $table->string('spouse_name')->nullable();
            $table->date('d_birth');
            $table->string('gender');
            $table->string('pass_num');
            $table->string('country');
            $table->string('phone');
            $table->string('social_phone')->nullable();
            $table->string('permanent_address');
            $table->string('dittrict');
            $table->string('police_station');
            $table->string('email');
            $table->string('account_no');
            $table->string('branch');
            $table->string('account_holder');
            $table->decimal('loan_amount', 10, 2);
            $table->string('repayment_period');
            $table->string('guarantor_name');
            $table->string('guarantor_father_name');
            $table->string('guarantor_mother_name');
            $table->string('guarantor_nid');
            $table->string('guarantor_thana');
            $table->string('guarantor_zilla');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
