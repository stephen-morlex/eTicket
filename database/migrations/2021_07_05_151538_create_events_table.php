<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->datetime('started_at');
            $table->datetime('ended_at');
            $table->text('description');
            $table->foreignId('event_category_id')->nullable()->constrained();
            $table->foreignId('event_location_id')->nullable()->onUpdate('cascade');
            $table->foreignId('event_type_id')->nullable()->onDelete('cascade');;
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('events');
    }
}
