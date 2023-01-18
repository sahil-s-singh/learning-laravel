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
        Schema::create('users_log', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('action');
            $table->timestamps();
        });

        DB::statement('CREATE TRIGGER products_product_log_insert_trigger AFTER INSERT ON users
        FOR EACH ROW
        BEGIN
          INSERT INTO users_log (name, email, action, created_at) VALUES(NEW.name, NEW.email, "create", UTC_TIMESTAMP);
        END');

        DB::statement('CREATE TRIGGER products_product_log_update_trigger AFTER UPDATE ON users
        FOR EACH ROW
        BEGIN
        INSERT INTO users_log (name, email, action, created_at) VALUES(NEW.name, NEW.email, "update", UTC_TIMESTAMP);
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_log');
        DB::statement('DROP TRIGGER IF EXISTS  `products_product_log_insert_trigger`');
        DB::statement('DROP TRIGGER IF EXISTS  `products_product_log_update_trigger`');
    }
};