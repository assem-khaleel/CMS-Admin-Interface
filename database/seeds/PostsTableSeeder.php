<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category1 = Category::create([
            'name'=> 'News',
        ]);

        $category2 = Category::create([
            'name'=> 'Marketing',
        ]);

        $category3 = Category::create([
            'name'=> 'Partnership',
        ]);

        $category4 = Category::create([
            'name'=> 'Hiring',
        ]);

        $author1 = User::create([
            'name'=>'ismaeel',
            'email'=> 'ismaeel@gmail.com',
            'password'=>\Illuminate\Support\Facades\Hash::make('ismaeel')
        ]);

        $author2 = User::create([
            'name'=>'nabeel sleeman',
            'email'=> 'nabeel.sleeman@gmail.com',
            'password'=>\Illuminate\Support\Facades\Hash::make('nabeel')
        ]);
        $post1 = $author1->posts()->create([
            'title'=> 'We relocated our office to a new designed garage',
            'desription'=> 'Descriptors: plump, full, pouty, sultry, thin, fat, dry, cracked, scabby, split, pierced, chapped, swollen',
            'content'=> 'Descriptors: plump, full, pouty, sultry, thin, fat, dry, cracked, scabby, split, pierced, chapped, swollen, collagen-inflated… Key Emotions and Related Lip Gestures: ... The lips are often mashed together when someone is holding back their true feelings or opinions.Jan 26, 2013',
            'category_id'=> $category1->id,
            'image'=>'posts/1.jpeg',
        ]);

        $post2 = $author2->posts()->create([
            'title'=> 'Top 5 brilliant content marketing strategiese',
            'desription'=> 'Descriptors: plump, full, pouty, sultry, thin, fat, dry, cracked, scabby, split, pierced, chapped, swollen',
            'content'=> 'Descriptors: plump, full, pouty, sultry, thin, fat, dry, cracked, scabby, split, pierced, chapped, swollen, collagen-inflated… Key Emotions and Related Lip Gestures: ... The lips are often mashed together when someone is holding back their true feelings or opinions.Jan 26, 2013',
            'category_id'=> $category2->id,
            'image'=>'posts/2.jpg'
        ]);

        $post3 = $author2->posts()->create([
            'title'=> 'Best practices for minimalist design with example',
            'desription'=> 'Descriptors: plump, full, pouty, sultry, thin, fat, dry, cracked, scabby, split, pierced, chapped, swollen',
            'content'=> 'Descriptors: plump, full, pouty, sultry, thin, fat, dry, cracked, scabby, split, pierced, chapped, swollen, collagen-inflated… Key Emotions and Related Lip Gestures: ... The lips are often mashed together when someone is holding back their true feelings or opinions.Jan 26, 2013',
            'category_id'=> $category3->id,
            'image'=>'posts/3.jpg'
        ]);

        $post4 = $author1->posts()->create([
            'title'=> 'New published books to read by a product designer',
            'desription'=> 'Descriptors: plump, full, pouty, sultry, thin, fat, dry, cracked, scabby, split, pierced, chapped, swollen, collagen-inflated… Key Emotin',
            'content'=> 'Descriptors: plump, full, pouty, sultry, thin, fat, dry, cracked, scabby, split, pierced, chapped, swollen, collagen-inflated… Key Emotions and Related Lip Gestures: ... The lips are often mashed together when someone is holding back their true feelings or opinions.Jan 26, 2013',
            'category_id'=> $category4->id,
            'image'=>'posts/4.jpg',

        ]);

        $tag1 = Tag::create([
            'name'=> 'Job',
        ]);

        $tag2 = Tag::create([
            'name'=> 'Customers',
        ]);

        $tag3 = Tag::create([
            'name'=> 'Record',
        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag2->id,$tag3->id]);
        $post3->tags()->attach([$tag1->id,$tag3->id]);
        $post4->tags()->attach([$tag3->id,$tag2->id]);

    }
}
