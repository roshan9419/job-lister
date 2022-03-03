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
            $table->string('company_name');
            $table->string('company_photo_url');
            $table->string('title');
            $table->string('title_slug');
            $table->string('description');
            $table->string('status');
            $table->string('external_apply_link')->nullable();
            $table->string('job_type');
            $table->json('job_locations');
            $table->json('skills_required');
            $table->json('applicants')->nullable();
            $table->integer('total_vacancies')->nullable();
            $table->integer('experience');
            $table->integer('start_salary')->nullable();
            $table->integer('end_salary')->nullable();
            $table->integer('duration')->nullable();
            $table->timestamp('apply_last_date');
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
