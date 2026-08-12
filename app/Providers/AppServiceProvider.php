<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\StrukturOrganisasi;
use App\Models\Ppdb;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
         Paginator::useBootstrapFive();
         
        try {

            if (Schema::hasTable('struktur_organisasis')) {

                View::share(
                    'strukturOrganisasi',
                    StrukturOrganisasi::all()
                );

            } else {

                View::share(
                    'strukturOrganisasi',
                    collect()
                );

            }


            if (Schema::hasTable('ppdb')) {

                View::share(
                    'ppdb',
                    Ppdb::first()
                );

            } else {

                View::share(
                    'ppdb',
                    null
                );

            }

        } catch (\Exception $e) {

            View::share('strukturOrganisasi', collect());
            View::share('ppdb', null);

        }
    }
}
