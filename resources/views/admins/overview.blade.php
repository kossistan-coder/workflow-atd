@extends('layouts.onboard')

@section('content')
<div class="push">

    <div class="flex-card-2" >
      <div class="text-bold f-16">Dashboard</div>
      <div>
{{--          <div class="ui floating dropdown labeled blue icon button" >--}}
{{--              <i class="filter icon"></i>--}}
{{--              <span class="text">Filter Posts</span>--}}
{{--              <div class="menu">--}}
{{--                <div class="ui icon search input">--}}
{{--                  <i class="search icon"></i>--}}
{{--                  <input type="text" placeholder="Search tags...">--}}
{{--                </div>--}}
{{--                <div class="divider"></div>--}}
{{--                <div class="header">--}}
{{--                  <i class="tags icon"></i>--}}
{{--                  Tag Label--}}
{{--                </div>--}}
{{--                <div class="scrolling menu">--}}
{{--                  <div class="item">--}}
{{--                    <div class="ui red empty circular label"></div>--}}
{{--                    Important--}}
{{--                  </div>--}}
{{--                  <div class="item">--}}
{{--                    <div class="ui blue empty circular label"></div>--}}
{{--                    Announcement--}}
{{--                  </div>--}}
{{--                  <div class="item">--}}
{{--                    <div class="ui black empty circular label"></div>--}}
{{--                    Cannot Fix--}}
{{--                  </div>--}}
{{--                  <div class="item">--}}
{{--                    <div class="ui purple empty circular label"></div>--}}
{{--                    News--}}
{{--                  </div>--}}
{{--                  <div class="item">--}}
{{--                    <div class="ui orange empty circular label"></div>--}}
{{--                    Enhancement--}}
{{--                  </div>--}}
{{--                  <div class="item">--}}
{{--                    <div class="ui empty circular label"></div>--}}
{{--                    Change Declined--}}
{{--                  </div>--}}
{{--                  <div class="item">--}}
{{--                    <div class="ui yellow empty circular label"></div>--}}
{{--                    Off Topic--}}
{{--                  </div>--}}
{{--                  <div class="item">--}}
{{--                    <div class="ui pink empty circular label"></div>--}}
{{--                    Interesting--}}
{{--                  </div>--}}
{{--                  <div class="item">--}}
{{--                    <div class="ui green empty circular label"></div>--}}
{{--                    Discussion--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          <div class="ui  button" style="margin-bottom: 10px;" id="back-black">--}}
{{--              Notifications--}}
{{--          </div>--}}
      </div>
  </div>
    <br>


  <div class="grid-half">
      <article>

          <x-overview-cards/>
          <section style="margin-top:7px; ">

              <div class="text-bold f-16" style="padding-bottom: 7px">
                  Recent orders
              </div>
              <div>
                <x-user-demande-overview/>
              </div>
          </section>
      </article>
      <article>
            <div>
                <x-admin-overview/>
            </div>
          <br>
          <div>
              <div class="text-bold">
                  Sales Analytics
              </div>
              <div class="ui raised segment">
                  <div class="flex-card-2">
                      <div>
                          <a  class="ui circular icon big purple  label">
                              <i class="lni lni-shopping-basket"></i>
                          </a>
                      </div>
                      <div>
                          <div>
                              <div class="ui tiny header">

                                  <div class="content">
                                    Uptime Guarantee
                                    <div class="sub header" style="padding-top: 5px;">
                                      Derniere 24 heures
                                    </div>
                                  </div>
                                </div>
                          </div>
                      </div>
                      <div>
                          <div id="text-green-base">+39%</div>
                      </div>
                      <div class="text-bold">
                          3849
                      </div>
                  </div>
              </div>

              <div class="ui raised segment">
                  <div class="flex-card-2">
                      <div>
                          <a  class="ui circular icon big   label" id="back-red-base">
                              <i class="lni lni-teabag"></i>
                          </a>
                      </div>
                      <div>
                          <div>
                              <div class="ui tiny header">

                                  <div class="content">
                                    Uptime Guarantee
                                    <div class="sub header" style="padding-top: 5px;">
                                      Derniere 24 heures
                                    </div>
                                  </div>
                                </div>
                          </div>
                      </div>
                      <div>
                          <div id="text-red-base">-17%</div>
                      </div>
                      <div class="text-bold">
                          1100
                      </div>
                  </div>
              </div>

              <div class="ui raised segment">
                  <div class="flex-card-2">
                      <div>
                          <a  class="ui circular icon big teal  label" >
                              <i class="lni lni-users"></i>
                          </a>
                      </div>
                      <div>
                          <div>
                              <div class="ui tiny header">

                                  <div class="content">
                                    new customers
                                    <div class="sub header" style="padding-top: 5px;">
                                      Derniere 24 heures
                                    </div>
                                  </div>
                                </div>
                          </div>
                      </div>
                      <div>
                          <div id="text-green-base">+17%</div>
                      </div>
                      <div class="text-bold">
                          849
                      </div>
                  </div>
              </div>

              <div class="dash-blue-border">
                  <div class="inline">
                      <i class="lni lni-plus"></i>
                      Add Product
                  </div>
              </div>

          </div>
      </article>

  </div>
</div>
<script>
 $.toast({
              title: 'LOOK',
              message: 'See, how long i will last',
              showProgress: 'bottom'
              })
              ;

  </script>
@endsection

