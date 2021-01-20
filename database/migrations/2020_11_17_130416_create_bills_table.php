<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gstin');
            $table->string('invoice_no');
            $table->string('state_code');
            $table->date("registration_date");
            $table->date("invoice_date");
            $table->string('gst5e_amt');
            $table->string('gst5cgst');
            $table->string('gst5sgst');
            $table->string('gst5t_gst');
            $table->string('gst5t_amt');
            $table->string('gst12e_amt');
            $table->string('gst12cgst');
            $table->string('gst12sgst');
            $table->string('gst12t_gst');
            $table->string('gst12t_amt');
            $table->string('gst18e_amt');
            $table->string('gst18cgst');
            $table->string('gst18sgst');
            $table->string('gst18t_gst');
            $table->string('gst18t_amt');
//--------------------------------------------18% GST---------------
            $table->string('gst28e_amt');
            $table->string('gst28cgst');
            $table->string('gst28sgst');
            $table->string('gst28t_gst');
            $table->string('gst28t_amt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
