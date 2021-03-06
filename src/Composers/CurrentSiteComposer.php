<?php

namespace Appstract\Multisite\Composers;

use Config;
use Illuminate\View\View;
use Appstract\Multisite\Site;

class CurrentSiteComposer
{
    /**
     * Site.
     *
     * @var [type]
     */
    protected $site;

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (! $this->site) {
            $this->site = Site::where('slug', Config::get('multisite.site'))->first();
        }

        $view->with('currentSite', $this->site);
    }
}
