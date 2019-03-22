@extends('layouts.admin')
  @section('content')
  <!--outter-wp-->
    <div class="outter-wp">
        <!--sub-heard-part-->
          <div class="sub-heard-part">
           <ol class="breadcrumb m-b-0">
            <li><a href="index.html">Home</a></li>
            <li class="active">Profile</li>
          </ol>
           </div>
          <!--//sub-heard-part-->
          <!--/profile-->
          <h3 class="sub-tittle pro">Profile</h3>
               <div class="profile-widget">
                  <img src="{{$user->avatar}}" alt="{{$user->lastName}}" height="100" width="100" />
                  <h2>{{$user->firstName}} {{$user->lastName}}</h2>
                  @if( $user->staff )
                    <p>{{$user->staff->designation}}</p>
                  @elseif( $user->admin )
                    <p>{{$user->admin->designation}}</p>
                    <p><a class="tooltips " href="{{url('admin-update-profile')}}" title="Edit profile"><i class="fa fa-edit "></i></a></p>
                  @endif
                </div>
                  <!--/profile-inner-->
                   <div class="profile-section-inner">
                         <div class="col-md-6 profile-info">
                        <h3 class="inner-tittle">Personal Information </h3>
                        <div class="main-grid3">
                           <div class="p-20">
                          <div class="about-info-p">
                            <strong>Full Name</strong>
                            <br>
                            <p class="text-muted">{{$user->firstName}} {{$user->middleName}} {{$user->lastName}}</p>
                          </div>
                          <div class="about-info-p">
                            <strong>Mobile</strong>
                            <br>
                            <p class="text-muted">{{$user->phoneNumber}}</p>
                          </div>
                          <div class="about-info-p">
                            <strong>Email</strong>
                            <br>
                            <p class="text-muted"><a href="mailto:{{$user->email}}">{{$user->email}}</a></p>
                          </div>
                          <div class="about-info-p m-b-0">
                            <strong>Address</strong>
                            <br>
                            <p class="text-muted">{{$user->address}}</p>
                          </div>
                        </div>
                       </div>
                       @if( $user->biography )
                       <h3 class="inner-tittle">Biography </h3>
                      <div class="main-grid3 p-skill">
                        <p>{{$user->biography}}</p>
                      </div>
                      @endif
                      <!--<h3 class="inner-tittle two">Skills </h3>
                        <div class="main-grid3">
                              <div class="bar">
                            <p>UI/UX</p>
                          </div>
                            <div class="skills">
                               <div class="skill1" style="width:100%"> </div>
                            </div>
                              <div class="bar">
                                <p>HTML / CSS3 / SASS</p>
                              </div>
                            <div class="skills">
                               <div class="skill2" style="width:90%"> </div>
                            </div>
                              <div class="bar">
                                <p>Javascript</p>
                              </div>
                            <div class="skills">
                               <div class="skill3" style="width:75%"> </div>
                            </div>
                            <div class="bar">
                                <p>Wordpress</p>
                              </div>
                            <div class="skills">
                               <div class="skill4" style="width:85%"> </div>
                            </div>
                          </div>-->
                      </div>
                      @if( count($ordersPackaged) )
                       <div class="col-md-6 profile-info two">
                       <h3 class="inner-tittle">Orders Packaged </h3>

                      @foreach( $ordersPackaged as $orderPackaged )
                        <div class="main-grid3 p-skill">

                            <ul class="timeline">

                              <li>
                                <div class="timeline-badge danger"><i class="fa fa-times-circle-o"></i></div>
                                <div class="timeline-panel">
                                <div class="timeline-heading">
                                   <h4 class="timeline-title"><a href="/order/{{$orderPackaged->id}}">{{$orderPackaged->name}}</a></h4>
                                </div>
                                <div class="timeline-body">
                                   <p class="time">{{$orderPackaged->updated_at}}</p>
                                  <p>Packaged Order Number {{$orderPackaged->id}} </p>
                                </div>
                                </div>
                              </li>


                            </ul>
                            <div class="clearfix"></div>
                          </div>

                          @endforeach


                      </div>
                      @endif

                      @if( count($ordersReleased) )
                       <div class="col-md-6 profile-info two">
                       <h3 class="inner-tittle">Orders Released </h3>

                      @foreach( $ordersReleased as $orderReleased )
                        <div class="main-grid3 p-skill">

                            <ul class="timeline">


                              <li>
                                <div class="timeline-badge success"><i class="fa fa-check-circle-o"></i></div>
                                <div class="timeline-panel">
                                <div class="timeline-heading">
                                  <h4 class="timeline-title"><a href="/order/{{$orderReleased->id}}">{{$orderReleased->name}}</a></h4>
                                </div>
                                <div class="timeline-body">
                                   <p class="time">{{$orderReleased->updated_at}}</p>
                                  <p>Released Order {{$orderReleased->id}} <i class="fa fa-picture-o"></i></p>
                                </div>
                                </div>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                          </div>

                          @endforeach


                      </div>
                      @endif
                      <!--/map-->
                    <!--<div class="col-md-6 profile-info two">
                       <h3 class="inner-tittle two">My Office </h3>
                      <div class="main-grid3 map">

                              <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Purwokerto,+Central+Java,+Indonesia&amp;aq=0&amp;oq=purwo&amp;sll=37.0625,-95.677068&amp;sspn=50.291089,104.238281&amp;ie=UTF8&amp;hq=&amp;hnear=Purwokerto,+Banyumas,+Central+Java,+Indonesia&amp;ll=-7.431391,109.24783&amp;spn=0.031022,0.050898&amp;t=m&amp;z=14&amp;output=embed"></iframe>
                                    <div class="gmap-info">
                                        <h4> <i class="fa fa-map-marker"></i> <b><a href="#" class="text-dark">Augment Pvt. Ltd</a></b></h4>
                                        <p>No. 3,Honey Infinity - Tower, </p>
                                         <p>E 3rd, 4th, and 5th Floors</p>
                                        <p>London, UK</p>
                                      </div>

                        </div>-->


                        <!--//map-->
                      <!--</div>-->
                      <div class="clearfix"></div>
                    </div>

              <!--//profile-inner-->
              <!--//profile-->
        </div>
        <!--//outer-wp-->
  @endsection
