<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->uuid('account_id');
            $table->string('account_name');
            $table->uuid('content_id')
                  ->foreign('content_id')
                  ->references('id')
                  ->on('contents')
                  ->onDelete('cascade');
            $table->string('email_address');
            $table->string('password');
            $table->boolean('is_multi_factor_authentication')->default(false);
            $table->boolean('is_use_oauth2')->default(false);
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
        Schema::dropIfExists('accounts');
    }
};
