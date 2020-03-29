<?php

use App\Models\Category;
use App\Models\Group;
use App\Models\Project;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    protected $users;
    protected $clients;
    protected $projects;
    protected $groups;

    protected $categories;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Initialize
        $this->users = collect();
        $this->clients = collect();
        $this->projects = collect();
        $this->groups = collect();

        $this->categories = Category::all();

        //Seed with fake values
        $this->users = factory(User::class, 5)->create();
        $this->clients = factory(Client::class, 5)->create();
        $this->projects = factory(Project::class, 15)->create();
        $this->groups =  factory(Group::class, 30)->create();

        $this->setUserGroups();
        $this->setUserCategories();
    }

    private function setUserGroups()
    {
        $this->users->each(function (User $user) {
            $groups = $this->groups->shuffle()->take(2)->pluck('id')->toArray();

            $user->groups()->attach($groups);
        });
    }

    private function setUserCategories()
    {
        $this->users->each(function (User $user) {
            $categories = $this->categories->shuffle()->take(2)->pluck('id')->toArray();

            $user->categories()->attach($categories);
        });
    }
}
