<!-- /////////////////////////////// -->
<?php

// // database/migrations/xxxx_xx_xx_xxxxxx_create_article_parts_table.php
// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateArticlePartsTable extends Migration
// {
//     public function up()
//     {
//         Schema::create('article_parts', function (Blueprint $table) {
//             $table->id();
//             $table->unsignedBigInteger('article_id');
//             $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
//             $table->string('type'); // 'text' hoặc 'image'
//             $table->text('content')->nullable(); // Lưu nội dung văn bản
//             $table->string('image_path')->nullable(); // Lưu đường dẫn hình ảnh
//             $table->unsignedInteger('order'); // Thứ tự của phần trong bài viết
//             $table->timestamps();
//         });
//     }

//     public function down()
//     {
//         Schema::dropIfExists('article_parts');
//     }
// }



////////////////////////////////////////////////////



// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateSubMenuTable extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         Schema::create('sub_menu', function (Blueprint $table) {
//             $table->id();
//             $table->string('name', 255);
//             $table->text('description')->nullable();
//             $table->boolean('visible')->default(true);
//             $table->timestamps();
//             $table->foreignId('category_id')->constrained()->onDelete('cascade');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('sub_menu');
//     }
// }


/////////////////////////////////////////////




// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('articles', function (Blueprint $table) {
//             $table->id();
//             $table->string('title');
//             $table->text('content');
//             $table->unsignedBigInteger('user_id');
//             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//             $table->timestamp('published_at')->nullable();
//             $table->boolean('featured')->default(false);
//             $table->unsignedInteger('view_count')->default(0);
//             $table->unsignedBigInteger('category_id')->nullable();
//             $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('articles');
//     }
// };


////////////////////////////////////////////////////



// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateSubMenuTable extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         Schema::create('sub_menu', function (Blueprint $table) {
//             $table->id();
//             $table->string('name', 255);
//             $table->text('description')->nullable();
//             $table->boolean('visible')->default(true);
//             $table->timestamps();
//             $table->foreignId('category_id')->constrained()->onDelete('cascade');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('sub_menu');
//     }
// }
