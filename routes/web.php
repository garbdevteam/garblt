<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::domain('admin.website.local')->name('admin.')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', function(){
            return redirect()->route('admin.about_authority');
        });


        Route::get('/about_authority', 'Backend\AboutAuthorityController@AboutAuthority')->name('about_authority');

        Route::resource('/authority_leaders', 'Backend\AuthorityLeadersController')->except('show');
        Route::get('/authority_leaders/order', 'Backend\AuthorityLeadersController@orderGet')->name('authority_leaders.order');
        Route::patch('/authority_leaders/order/edit', 'Backend\AuthorityLeadersController@orderEdit')->name('authority_leaders.orderEdit');

        Route::get('/about_authority/importance_of_authority', 'Backend\AboutAuthorityController@ImportanceOfAuthorityGet')->name('about_authority.importance_of_authority');
        Route::patch('/about_authority/importance_of_authority', 'Backend\AboutAuthorityController@ImportanceOfAuthorityUpdate')->name('about_authority.importance_of_authority');
        Route::patch('/about_authority/importance_of_authority_image', 'Backend\AboutAuthorityController@ImportanceOfAuthorityImageUpdate')->name('about_authority.importance_of_authority_image');

        Route::get('/about_authority/chairman_word', 'Backend\AboutAuthorityController@ChairmanWordUpdate')->name('about_authority.chairman_word');
        Route::patch('/about_authority/chairman_word', 'Backend\AboutAuthorityController@ChairmanWordUpdate')->name('about_authority.chairman_word');
        Route::patch('/about_authority/chairman_name', 'Backend\AboutAuthorityController@chairmanNameUpdate')->name('about_authority.chairman_name');
        Route::patch('/about_authority/chairman_word_image', 'Backend\AboutAuthorityController@ChairmanWordImageUpdate')->name('about_authority.chairman_word_image');

        Route::patch('/about_authority/evolution_image', 'Backend\AboutAuthorityController@evolutionImageUpdate')->name('about_authority.evolution_image');
        Route::patch('/about_authority/persons_image', 'Backend\AboutAuthorityController@personsImageUpdate')->name('about_authority.persons_image');

        Route::patch('/about_authority/map', 'Backend\AboutAuthorityController@mapUpdate')->name('about_authority.map');

        //Route::resource('/authority_tenders', 'Backend\TendersAndAuctionsController')->except('show');



        Route::resource('/regions', 'Backend\RegionsController')->except('show');
        Route::get('/regions/order', 'Backend\RegionsController@orderGet')->name('regions.order');
        Route::patch('/regions/order/edit', 'Backend\RegionsController@orderEdit')->name('regions.orderEdit');

        Route::resource('/regions/{regions_id}/regions_roads', 'Backend\RegionsRoadsProjectController')->except('show');
        Route::get('/regions/{regions_id}/regions_roads/order', 'Backend\RegionsRoadsProjectController@orderGet')->name('regions_roads.order');
        Route::patch('/regions/{regions_id}/regions_roads/order/edit', 'Backend\RegionsRoadsProjectController@orderEdit')->name('regions_roads.orderEdit');

        Route::resource('/regions/{regions_id}/regions_bridges', 'Backend\RegionsBridgesProjectController')->except('show');
        Route::get('/regions/{regions_id}/regions_bridges/order', 'Backend\RegionsBridgesProjectController@orderGet')->name('regions_bridges.order');
        Route::patch('/regions/{regions_id}/regions_bridges/order/edit', 'Backend\RegionsBridgesProjectController@orderEdit')->name('regions_bridges.orderEdit');

        Route::resource('/news', 'Backend\NewsController');
        Route::get('/news/{news_id}/full', 'Backend\NewsController@GetFullImage')->name('news.full_image');
        Route::get('/news/{news_id}/thumb', 'Backend\NewsController@GetThumbnailImage')->name('news.thumb_image');

        Route::resource('/image_assets', 'Backend\ImageAssetsController')->except('show');


        Route::get('/about_authority/history_of_authority', 'Backend\AboutAuthorityController@HistoryOfAuthorityGet')->name('about_authority.history_of_authority');
        Route::patch('/about_authority/history_of_authority', 'Backend\AboutAuthorityController@HistoryOfAuthorityUpdate')->name('about_authority.history_of_authority');


        Route::get('/about_authority/organizational_structure', 'Backend\AboutAuthorityController@OrganizationalStructureGet')->name('about_authority.organizational_structure');
        Route::patch('/about_authority/organizational_structure', 'Backend\AboutAuthorityController@OrganizationalStructureUpdate')->name('about_authority.organizational_structure');

        Route::resource('/road_signs', 'Backend\RoadSignsController')->except('show');
        Route::get('/road_signs/order', 'Backend\RoadSignsController@orderGet')->name('road_signs.order');
        Route::patch('/road_signs/order/edit', 'Backend\RoadSignsController@orderEdit')->name('road_signs.orderEdit');

        Route::resource('/traffic_control', 'Backend\TrafficControlController')->except('show');
        Route::get('/traffic_control/order', 'Backend\TrafficControlController@orderGet')->name('traffic_control.order');
        Route::patch('/traffic_control/order/edit', 'Backend\TrafficControlController@orderEdit')->name('traffic_control.orderEdit');

        Route::resource('/collection_stations_and_scales', 'Backend\CollectionStationsAndScalesController')->except('show');
        Route::get('/collection_stations_and_scales/order', 'Backend\CollectionStationsAndScalesController@orderGet')->name('collection_stations_and_scales.order');
        Route::patch('/collection_stations_and_scales/order/edit', 'Backend\CollectionStationsAndScalesController@orderEdit')->name('collection_stations_and_scales.orderEdit');

        Route::resource('/national_roads_project', 'Backend\NationalRoadsProjectController');

        Route::get('/national_roads_project/order', 'Backend\NationalRoadsProjectController@orderGet')->name('national_roads_project.order');
        Route::patch('/national_roads_project/order/edit', 'Backend\NationalRoadsProjectController@orderEdit')->name('national_roads_project.orderEdit');

        Route::get('/roads/allowable_loads', 'Backend\RoadsController@AllowableLoadsGet')->name('roads.allowable_loads');
        Route::patch('/roads/allowable_loads', 'Backend\RoadsController@AllowableLoadsUpdate')->name('roads.allowable_loads');

        Route::get('/roads/future_projects', 'Backend\RoadsController@FutureProjectsGet')->name('roads.future_projects');
        Route::patch('/roads/future_projects', 'Backend\RoadsController@FutureProjectsUpdate')->name('roads.future_projects');

        Route::get('/roads/road_network_map', 'Backend\RoadsController@RoadNetworkMapGet')->name('roads.road_network_map');
        Route::patch('/roads/road_network_map', 'Backend\RoadsController@RoadNetworkMapUpdate')->name('roads.road_network_map');

        Route::get('/utility_page/privacy_policy', 'Backend\UtilityPagesController@PrivacyPolicyGet')->name('utility_page.privacy_policy');
        Route::patch('/utility_page/privacy_policy', 'Backend\UtilityPagesController@PrivacyPolicyUpdate')->name('utility_page.privacy_policy');

        Route::get('/utility_page/terms_and_conditions', 'Backend\UtilityPagesController@TermsAndConditionsGet')->name('utility_page.terms_and_conditions');
        Route::patch('/utility_page/terms_and_conditions', 'Backend\UtilityPagesController@TermsAndConditionsUpdate')->name('utility_page.terms_and_conditions');


        Route::get('/utility_page/disclaimer', 'Backend\UtilityPagesController@DisclaimerGet')->name('utility_page.disclaimer');
        Route::patch('/utility_page/disclaimer', 'Backend\UtilityPagesController@DisclaimerUpdate')->name('utility_page.disclaimer');

        Route::resource('/jobs', 'Backend\JobsController')->except('show');


        Route::resource('/auctions', 'Backend\TendersAndAuctionsController')->except('show');

        Route::get('/contactus', 'Backend\AboutAuthorityController@getContactUs')->name('get-contact');

        Route::resource('/service_departments', 'Backend\ServiceDepartmentsController')->except('show');
        Route::get('/service_departments/order', 'Backend\ServiceDepartmentsController@orderGet')->name('service_departments.order');
        Route::patch('/service_departments/order/edit', 'Backend\ServiceDepartmentsController@orderEdit')->name('service_departments.orderEdit');

        Route::resource('/services', 'Backend\ServicesController')->except('show');
        Route::get('/services/{service_id}/service_image', 'Backend\ServicesController@getImage')->name('service.image');
        Route::get('/services/order', 'Backend\ServicesController@orderGet')->name('services.order');
        Route::patch('/services/order/edit', 'Backend\ServicesController@orderEdit')->name('services.orderEdit');

        Route::resource('/services/{service_id}/service_file', 'Backend\ServiceFilesController')->except('show');
        Route::get('/services/{service_id}/service_file/order', 'Backend\ServiceFilesController@orderGet')->name('service_file.order');
        Route::patch('/services/{service_id}/service_file/order/edit', 'Backend\ServiceFilesController@orderEdit')->name('service_file.orderEdit');

        Route::get('/news/{news_id}/thumbnail',function(){
            return view('test');
        });

        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        Route::post('/upload', function(Request $request){
            $imgpath = request()->file('name')->store('uploads', 'public');
            return json_encode(['location' => "/storage/" . $imgpath]);
        });
    });

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('/home', 'HomeController@index')->name('home');

});

Route::domain(env('MAIN_WEBSITE'))->name('frontend.')->group(function () {
    Route::get('/', "Frontend\HomeController@home")->name('home');

    //Route::get('login', 'Frontend\FrontencController@showLoginForm')->name('login');

    Route::get('/testtest' , "Backend\NationalRoadsProjectController@GetFullImage")->name('test.test');
    Route::get('/about-us', "Frontend\AboutAuthorityController@aboutUs")->name('about-us');
    Route::get('/road-network-map', "Frontend\FrontencController@roadNetworkMap")->name('road-network-map');
    Route::get('/projects', "Frontend\FrontencController@projects")->name('projects');
    Route::get('/national_roads_project/{project_id}', 'Backend\NationalRoadsProjectController@GetFullImage')->name('project.full_image');
    Route::get('/tolling-station', "Frontend\FrontencController@tollingStation")->name('tolling-station');
    Route::get('/allowable-loads', "Frontend\FrontencController@allowableLoads")->name('allowable-loads');
    Route::get('/road-safety', "Frontend\FrontencController@roadSafety")->name('road-safety');
    Route::get('/regions', "Frontend\FrontencController@regions")->name('regions');
    Route::get('/regions-details/{id}', "Frontend\FrontencController@regionDetails")->name('regions.details');

    Route::get('/services', "Frontend\FrontencController@services")->name('services');
    Route::get('/news', "Frontend\FrontencController@news")->name('news.index');
    Route::get('/news/{id}/news', "Frontend\FrontencController@newsShowOne")->name('news.show.one');
    Route::get('/media', "Frontend\FrontencController@media")->name('media.index');

    Route::get('/tenders', "Frontend\FrontencController@tender")->name('tender.index');
    Route::get('/tenders/{id}', "Frontend\FrontencController@tenderShow")->name('tender.show');

    Route::get('/jobs', "Frontend\FrontencController@jobs")->name('jobs.index');
    Route::get('/jobs/{id}', "Frontend\FrontencController@jobsShow")->name('jobs.show');

    Route::get('/contact-us', "Frontend\FrontencController@contactUs")->name('contact-us');
    Route::post('/contact-us', "Backend\AboutAuthorityController@storeContactUs")->name('store.contact-us');


    Route::get('/terms-conditions', "Frontend\FrontencController@termsConditions")->name('terms-conditions');
    Route::get('/privacy-policy', "Frontend\FrontencController@privacyPolicy")->name('privacy-policy');
    Route::get('/faq', "Frontend\FrontencController@faq")->name('faq');
    Route::get('/disclaimer', 'Frontend\FrontencController@DisclaimerGet')->name('disclaimer');



    Route::get('/about-authority/organizational-structure', "Frontend\AboutAuthorityController@OrganizationalStructureGet")->name('about_authority.organizational_structure');
    Route::get('/about-authority/importance-of-authority', 'Frontend\AboutAuthorityController@ImportanceOfAuthorityGet')->name('about_authority.importance_of_authority');
    Route::get('/about-authority/history-of-authority', 'Frontend\AboutAuthorityController@HistoryOfAuthorityGet')->name('about_authority.history_of_authority');
    Route::get('/about-authority/chairman-word', 'Frontend\AboutAuthorityController@ChairmanWordGet')->name('about_authority.chairman_word');

    Route::get('/about-authority/history-of-authority', 'Frontend\AboutAuthorityController@HistoryOfAuthorityGet')->name('about_authority.history_of_authority');
    Route::get('/authority-leaders/history-of-authority', 'Frontend\AboutAuthorityController@HistoryOfAuthorityGet')->name('about_authority.history_of_authority');
    Route::get('/about-authority/authority-leaders', 'Frontend\AboutAuthorityController@AuthorityLeadersGet')->name('about_authority.authority_leaders');

    // Route::get('/news', "Frontend\NewsController@index")->name('news.index');
     Route::get('/news/{id}', "Frontend\NewsController@show")->name('news.detail');
    // Route::get('/news/{news_id}/full', 'Frontend\NewsController@GetFullImage')->name('news.full_image');
    //Route::get('/news/{news_id}/thumbnail', 'Frontend\NewsController@GetThumbnailImage')->name('news.thumb_image');

    // Route::get('/regions', "Frontend\RegionsController@index")->name('region');
    // Route::get('/regions/{id}', "Frontend\RegionsController@show")->name('region.detail');
    // Route::get('/regions/{region_id}/bridges', "Frontend\RegionsController@RegionBridges")->name('region.bridges');
    // Route::get('/regions/{region_id}/roads', "Frontend\RegionsController@RegionRoads")->name('region.roads');

    Route::get('/roads/road-signs', 'Frontend\RoadsController@RoadSignsGet')->name('roads.road_signs');
    Route::get('/roads/traffic-control', 'Frontend\RoadsController@TrafficControlGet')->name('roads.traffic_control');
    Route::get('/roads/collection-stations-and-scales', 'Frontend\RoadsController@CollectionStationsAndScalesGet')->name('roads.collection_stations_and_scales');
    Route::get('/roads/national-roads-project', 'Frontend\RoadsController@NationalRoadsProjectGet')->name('roads.national_roads_project');
    Route::get('/roads/national-roads-project/{id}', 'Frontend\RoadsController@NationalRoadsProjectGetOne')->name('roads.national_roads_project.show');

    Route::get('/roads/allowable-loads', 'Frontend\RoadsController@AllowableLoadsGet')->name('roads.allowable_loads');
    Route::get('/roads/future-projects', 'Frontend\RoadsController@FutureProjectsGet')->name('roads.future_projects');
    Route::get('/roads/road-network-map', 'Frontend\RoadsController@RoadNetworkMapGet')->name('roads.road_network_map');

    // Route::get('/jobs', 'Frontend\JobsController@JobsGet')->name('jobs');
    Route::get('/auctions', 'Frontend\TendersAndAuctionsController@TendersAndAuctionsGet')->name('auctions');

    Route::get('/service-departments/{service_departments_id}', 'Frontend\ServiceDepartmentsController@ServiceDepartmentsGet')->name('service_departments');

    // Route::get('/privacy-policy', 'Frontend\UtilityPagesController@PrivacyPolicyGet')->name('privacy_policy');
  //  Route::get('/terms-and-conditions', 'Frontend\UtilityPagesController@TermsAndConditionsGet')->name('terms_and_conditions');
});


