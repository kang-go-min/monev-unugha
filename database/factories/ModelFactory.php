<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Survey::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'user_id' => $faker->randomNumber(5),
        'description' => $faker->sentence,
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Question::class, static function (Faker\Generator $faker) {
    return [
        'survey_id' => $faker->sentence,
        'user_id' => $faker->randomNumber(5),
        'title' => $faker->sentence,
        'question_type' => $faker->sentence,
        'option_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Answer::class, static function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->randomNumber(5),
        'question_id' => $faker->sentence,
        'survey_id' => $faker->sentence,
        'answer' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Responden::class, static function (Faker\Generator $faker) {
    return [
        'nama' => $faker->sentence,
        'usia' => $faker->sentence,
        'jk' => $faker->sentence,
        'alamat' => $faker->sentence,
        'nama_kk' => $faker->sentence,
        'id_wilayah' => $faker->sentence,
        'hp_telp' => $faker->sentence,
        'id_pekerjaan' => $faker->randomNumber(5),
        'tmpt_kerja' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Survey::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'user_id' => $faker->randomNumber(5),
        'description' => $faker->sentence,
        'start_date' => $faker->dateTime,
        'end_date' => $faker->dateTime,
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Answer::class, static function (Faker\Generator $faker) {
    return [
        'survey_id' => $faker->sentence,
        'user_id' => $faker->sentence,
        'ip_address' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        'json' => ['en' => $faker->sentence],
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Report::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'description' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
