<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->unsignedBigInteger('company_id');
            $table->string('title');
            $table->string('title_slug');
            $table->text('description');
            $table->string('status');
            $table->text('external_apply_link')->nullable();
            $table->string('job_type');
            $table->string('job_location');
            $table->string('location_type'); //Remote, on-site, hybrid
            $table->json('skills_required');
            $table->string('category_id');
            $table->json('applicants')->nullable(); //applicationIds
            $table->integer('total_vacancies')->nullable();
            $table->integer('experience');
            $table->integer('start_salary')->nullable();
            $table->integer('end_salary')->nullable();
            $table->integer('duration')->nullable();
            $table->date('apply_last_date')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
