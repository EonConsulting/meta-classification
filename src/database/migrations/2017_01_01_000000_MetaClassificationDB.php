<?php
use \Illuminate\Support\Facades\Schema;
use \Illuminate\Database\Schema\Blueprint;
use \Illuminate\Database\Migrations\Migration;
/**
 * Created by PhpStorm.
 * User: jharing10
 * Date: 2017/02/06
 * Time: 10:58 AM
 */
class MetaClassificationDB extends Migration  {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('meta_classifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('classification');
            $table->timestamps();

            $table->softDeletes();
        });

        Schema::create('meta_elements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('slug');
            $table->integer('parent_id')->unsigned()->index()->nullable();
            $table->integer('classification_id')->unsigned()->index()->nullable();
            $table->tinyInteger('required')->default(0);
            $table->float('version')->default(1);
            $table->timestamps();

            $table->softDeletes();
        });

        Schema::create('meta_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('metable_id')->unsigned()->index();
            $table->string('metable_type');
            $table->integer('meta_element_id')->unsigned()->index()->nullable();
            $table->longText('value');
            $table->float('version')->default(1);
            $table->timestamps();

            $table->softDeletes();
        });

        Schema::table('meta_elements', function(Blueprint $table) {
            $table->foreign('classification_id')->references('id')->on('meta_classifications')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('meta_elements')->onDelete('cascade');
        });

        Schema::table('meta_data', function(Blueprint $table) {
            $table->foreign('meta_element_id')->references('id')->on('meta_elements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('meta_classifications');
        Schema::drop('meta_elements');
        Schema::drop('meta_data');
    }

}

//meta_classifications
//id
//name
//slug
//classification

//meta_elements
//id
//name
//description
//slug
//parent_id
//classification_id
//required
//version

//meta_data
//id
//metable_id
//metable_type
//meta_element_id
//value