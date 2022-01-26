<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>القائمة الاساسية</h3>
        <ul class="nav side-menu">
            {{-- <li><a href="{{route('admin.about_authority')}}"><i class="fa fa-home"></i>عن الهيئة</a></li> --}}

            <li><a><i class="fa fa-home"></i> عن الهيئة<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('admin.authority_leaders.index')}}"><i class="fa fa-home"></i>قيادات الهيئة</a>
                    </li>
                    <li><a href="{{route('admin.about_authority.chairman_word')}}"><i class="fa fa-home"></i> كلمة رئيس
                            مجلس الادارة</a></li>
                    <li><a href="{{route('admin.about_authority.history_of_authority')}}"><i class="fa fa-home"></i>عن
                            الهيئة</a></li>
                    {{-- <li><a href="{{route('admin.about_authority.importance_of_authority')}}"><i
                                class="fa fa-home"></i>دور وأهمية الهيئة</a></li> --}}
                    <li><a href="{{route('admin.about_authority.organizational_structure')}}"><i
                                class="fa fa-home"></i>هيكل الهيئة</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> المركز الاعلامي<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('admin.news.index')}}"><i class="fa fa-home"></i> الاخبار</a></li>
                    <li><a href="{{ route('admin.image_assets.index')}}"><i class="fa fa-home"></i> الميديا</a></li>
                </ul>

            </li>
        </ul>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i>الطرق<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('admin.road_signs.index')}}"><i class="fa fa-home"></i> اشارات و علامات
                            الطرق</a></li>
                    <li><a href="{{route('admin.traffic_control.index')}}"><i class="fa fa-home"></i> وسائل التحكم
                            المروري</a></li>
                    <li><a href="{{route('admin.collection_stations_and_scales.index')}}"><i class="fa fa-home"></i>
                            محطات التحصيل والموازين</a></li>
                    <li><a href="{{route('admin.national_roads_project.index')}}"><i class="fa fa-home"></i> المشروع
                            القومي للطرق</a></li>
                    <li><a href="{{route('admin.roads.allowable_loads')}}"><i class="fa fa-home"></i> الأحمال المسموح
                            بها</a></li>
                    <li><a href="{{route('admin.roads.future_projects')}}"><i class="fa fa-home"></i>مشروعات
                            مستقبلیة</a></li>
                    <li><a href="{{route('admin.roads.road_network_map')}}"><i class="fa fa-home"></i>خريطة شبكة الطرق
                            في مصر</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> المناطق<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('admin.regions.index')}}"><i class="fa fa-home"></i> المناطق</a></li>
                    {{-- <li><a href="{{route('issued.index')}}"><i class="fa fa-home"></i> الصادرة</a>
            </li> --}}
               </ul>
            </li>
        </ul>

        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> المناقصات و الوظائف<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('admin.auctions.index')}}"><i class="fa fa-home"></i> المناقصات</a></li>
                    <li><a href="{{route('admin.jobs.index')}}"><i class="fa fa-home"></i> الوظائف</a></li>
                    {{-- <li><a href="{{route('issued.index')}}"><i class="fa fa-home"></i> الصادرة</a>
            </li> --}}
               </ul>
            </li>
        </ul>


        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> صفحات اخري<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('admin.utility_page.privacy_policy')}}"><i class="fa fa-home"></i> سياسة
                            الخصوصية</a></li>
                    <li><a href="{{route('admin.utility_page.terms_and_conditions')}}"><i class="fa fa-home"></i>الأحكام
                            والشروط</a></li>
                    <li><a href="{{route('admin.utility_page.disclaimer')}}"><i class="fa fa-home"></i>إخلاء
                            المسئولية</a></li>
                     <!-- <li><a href=""><i class="fa fa-home"></i> الصادرة</a></li>  -->
        </ul>
        </li>
        </ul>
        <ul class="nav side-menu">
            <li><a href="{{route('admin.service_departments.index')}}"><i class="fa fa-home"></i>أدارات خدمية</a></li>
            <li><a href="{{route('admin.services.index')}}"><i class="fa fa-home"></i>خدمات</a>
            </li>
            </li>
        </ul>
        <ul class="nav side-menu">
            <li><a href="{{route('admin.get-contact')}}"><i class="fa fa-home"></i>تواصل معنا</a>
            </li>
            </li>
        </ul>
        {{--
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> البيانات الرئيسية<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('places.index')}}"><i class="fa fa-home"></i> الاماكن</a></li>
        <li><a href="{{route('responsible.index')}}"><i class="fa fa-home"></i> المسئولين</a></li>
        </ul>
        </li>
        </ul> --}}

        {{-- <ul class="nav side-menu">
            @if (auth()->user()->hasAnyPermission(['superadmin', 'records-view']))

            <li><a><i class="fa fa-home"></i> الاقسام<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @if (auth()->user()->hasAnyPermission(['superadmin', 'records-view']))

                    <li><a href="{{route('employees.statistics')}}"><i class="fa fa-home"></i> الاحصائيات</a></li>
        <li><a href="{{route('employees.list')}}"><i class="fa fa-home"></i> سجل العاملين</a></li>
        <li><a href="{{route('employees.retirement.searchform')}}"><i class="fa fa-home"></i> سجل
                المتقاعدين</a></li>
        @endif
        <li><a href="{{route('employees.vacation.list')}}"><i class="fa fa-home"></i> الاجازات</a></li>

        </ul>
        </li>
        @endif


        @if (auth()->user()->hasAnyPermission(['superadmin', 'system-users-view',
        'records-primitive_data-view','system-backup-view']))

        <li>
            <a><i class="fa fa-sitemap"></i> البيانات الاساسية <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">


                @if (auth()->user()->hasAnyPermission(['superadmin',
                'system-users-view','system-backup-view','system-excel-import','system-turnoff']))
                <li><a href="{{route('system.menu')}}">النظام</a></li>
                @endif

                @if (auth()->user()->hasAnyPermission(['superadmin', 'records-primitive_data-view']))
                <li><a href="{{route('record.premitive-data')}}">السجلات</a></li>
                @endif

                @can('vacation-primitive_data-view')
                <li><a href="{{route('vacation.premitive-data')}}">الاجازات</a></li>

                @endcan

                @can('personnel-file-primitive_data-view')
                <li><a href="{{route('personnel-file.premitive-data')}}">الملف الشخصي</a></li>
                @endcan

                @can('administrative-file-primitive_data-view')
                <li><a href="{{route('administrative-file.premitive-data')}}">الملف الاداري</a></li>
                @endcan


            </ul>
        </li>
        @endif







        </ul> --}}
    </div>
</div>
<!-- /sidebar menu -->
