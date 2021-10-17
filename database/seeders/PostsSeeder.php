<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = Category::query()->create([
           'name' => 'PHP'
        ]);
        $c2 = Category::query()->create([
            'name' => 'JAVA'
        ]);
        Post::query()->create([
                'name' => 'PHP 8 overview',
                'description' => 'PHP 8.0 is a major update of the PHP language.',
                'content' => 'PHP 8.0 is a major update of the PHP language.
It contains many new features and optimizations including named arguments, union types, attributes, constructor property promotion, match expression, nullsafe operator, JIT, and improvements in the type system, error handling, and consistency.',
                'user_id' => '1',
                'category_id' => $c->id
            ]
        );
        Post::query()->create([
                'name' => 'JAVA info',
                'description' => 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.',
                'content' => 'Java was originally developed by James Gosling at Sun Microsystems (which has since been acquired by Oracle) and released in 1995 as a core component of Sun Microsystems Java platform. The original and reference implementation Java compilers, virtual machines, and class libraries were originally released by Sun under proprietary licenses. As of May 2007, in compliance with the specifications of the Java Community Process, Sun had relicensed most of its Java technologies under the GPL-2.0-only license. Oracle offers its own HotSpot Java Virtual Machine, however the official reference implementation is the OpenJDK JVM which is free open-source software and used by most developers and is the default JVM for almost all Linux distributions.',
                'user_id' => '1',
                'category_id' => $c2->id
            ]
        );
    }
}
