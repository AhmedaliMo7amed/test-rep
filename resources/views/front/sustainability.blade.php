@php

$lang = app()->getLocale();

$dir = 'left';
$dir2 = 'right';
$direction = 'ltr';
$prefix = '/en/';

if ($lang == 'ar') {
    $dir = 'right';
    $dir2 = 'left';
    $direction = 'rtl';
    $prefix = '/ar/';
} else if($lang == 'de') {
    $prefix = '/de/';
} else if($lang == 'ru') {
    $prefix = '/ru/';
} else if($lang == 'fr') {
    $prefix = '/fr/';
} else {
    $prefix = '/en/';
}

@endphp

@extends('front.layouts.master')

@section('title')
    Serry | Sustainability
@endsection

@push('custom-css-scripts')

@endpush

@section('content')
    <!-- ==================== Main ==================== -->
    <main>
      <!-- ________________ Start Banner Section ________________ -->
      <div class="anotherBanner">
        <img src="{{ asset('front/img/rest/bg.jpg') }}" alt="" class="img-fluid anotherBanner_img" />
        <div class="anotherBanner_content">
          <div class="container">

          </div>
        </div>
      </div>
      <!-- ________________ End Banner Section ________________ -->
      <div class="container my-5">

        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <h5 class="">SUSTAINABILITY</h5>
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus"></i>
                </button>
              </h2>
            </div>
        
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <p>Serry stands as one of the very first luxury sustainable resorts in Egypt with ecologically-friendly
                  architecture that is in harmony with nature. Our dedication and commitment to renewable
                  energy, water conservation and protection of marine life is supported by locally sourced
                  materials, adaptation of sustainable technology and minimized waste.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <h5 class="">MANAGEMENT</h5>
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus"></i>
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <p>ENVIRONMENTAL MANAGEMENT SYSTEM (ISO 14001) 
                  Serry strives to minimize any disruption to the environment arising from its activities by using
                  energy efficiently, and by reducing waste, emissions, and discharges. All operations and
                  activities are carried out on the highest standards of care and is compliant and certified
                  according to the internationally recognized principles of the ISO 14001 Environmental
                  Management System. 
                 <h6> TRAVELIFE SUSTAINABILITY SYSTEM :</h6>
                 <p>Serry operations are certified and compliant with the Travel Ife Sustainability System, Gold Class,
                  which is the highest lass in the initiative created and managed by the international travel
                  industry. It helps tourism related businesses to measure, improve and report on their
                  contribution to the environmental protection, social development and economic stability of the
                  destinations and communities in which they are based.</p>
        
                  <h6>GREEN STAR HOTEL PROGRAM:</h6>
                  <p>The Green Star Hotel (GSH) is a national green certification and capacity-building program
                    managed by the Egyptian Hotel Association (EHA) under the patronage of the Egyptian Ministry
                    of Tourism.  The GSH program offers an opportunity for hotels operating in Egypt to be
                    internationally recognized for raising their environmental performance and social standards
                    while reducing their operational costs.  A team of certified local and international experts guide
                    interested hotels through a sequence of training and information support sessions leading to
                    field audits to ensure compliance with the program standards prior to granting the GSH
                    certification. Serry is classified a gold member of the Green Star Program, which is the highest
                    classification in the program.</p>
        
                    <h6>RAISING ENVIRONMENTAL AWARENESS:</h6>
                    <p>Serry helps in raising environmental awareness by displaying its environmental policies in a
                      prominent place, and by giving each staff member a minimum of 2-hours training annually,
                      including specific environmental tasks &amp; policies for waste, water, and energy management.
                      Serry also educates guests on environmental issues by promoting an environmentally caring
                      hotel philosophy.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h2 class="mb-0">
                <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <h5 class="">WATER</h5>
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus"></i>
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <h6>PORTABLE WATER CONSUMPTION MANAGEMENT:</h6>
                <p>Serry monitors, analyzes, and manages its water consumption on regular basis in order to
                  consistently improve its water consumption. It ensures that kitchen dishwashing &amp; laundry
                  machines operate only when they are loaded to their nominal capacity. Water flow regulators
                  on all basin faucets, taps, and showers in addition to dual flush water-efficient toilets have been
                  installed throughout the developments and replaced traditional methods. In addition, Serry has
                  invested in an onsite seawater desalination plant in order to meet its drinking water demand.</p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingFour">
              <h2 class="mb-0">
                <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <h5 class="">WASTEWATER MANAGEMENT:</h5>
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus"></i>
                </button>
              </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
              <div class="card-body">
                <p>Better waste water management has been implemented through the use of treated waste water
                  for landscape irrigation, and by providing sewage disposal via own sewage plants. Serry has also
                  installed grease interceptors on all kitchen drains and is planning to adopt landscape drip
                  irrigation systems.</p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingFive">
              <h2 class="mb-0">
                <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <h5 class="">ENERGY</h5>
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus"></i>
                </button>
              </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
              <div class="card-body">
                <h6>ELECTRICITY CONSUMPTION MANAGEMENT</h6>
                <p>Serry continuously monitors its electricity consumption of the individual hotels and properties
                and reviews opportunities for energy savings. Initiatives such as the use of low energy lamps in
                all internal and external lighting, using room key activation cards for switching all room power,
                and the optimization of swimming pool temperature control have all been implemented to save
                
                energy. Natural sunlight has replaced energy-intensive dryers in the laundry in order to line-dry
                all possible linens. It has also adopted a strict maintenance strategy to ensure optimal use of
                plants and machinery.</p>


              <h6>ALTERNATIVE SOLUTIONS:</h6>  
              <p>
                Serry have partnered up with EACOM EDAW and the Fraunhofer Institute for Solar Energy Systems, two of the world’s leading environmental &amp; energy advisory firms, to improve its development’s energy consumption and efficiencies and in exploring different sustainability solutions and practices.
              </p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingSix">
              <h2 class="mb-0">
                <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                  <h5 class="">SUSTAINABLE FUTURE:</h5>
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus"></i>
                </button>
              </h2>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
              <div class="card-body">
                <p>Serry is currently planning to implement 3 environmental projects, including the replacement of
                  bottled gas with city gas for kitchen use, replacing oil fired hot water with solar hot water, and
                  using energy-efficient boilers. Serry is also implementing solutions to recover energy from the
                  main ventilation systems, insulating hot and chilled water pipes, and a series of ongoing
                  upgrades to the infrastructure with more energy efficient alternatives.</p>
              </div>
            </div>
          </div>


          <div class="card">
            <div class="card-header" id="headingSeven">
              <h2 class="mb-0">
                <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                  <h5 class="">WASTE</h5>
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus"></i>
                </button>
              </h2>
            </div>
            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
              <div class="card-body">
                <h6>WASTE MANAGEMENT:</h6>     
                <p>Serry waste management efforts includes recycling restaurant organic waste, garden green
                  waste, and construction demolition waste on all its developments. Guest recycling bins are
                  available across the site, and all paper, glass, metal, plastic, biological waste and composting are
                  separated. Serry is currently investigating the use of food waste for onsite energy production via
                  biogas combined heat and power.</p> 


                <h6>ENVIRONMENTALLY FRIENDLY PROCUREMENT:</h6>
                <p>Serry has implemented a series of procurement policies such as purchasing energy efficient
                  products, use of environmentally friendly refrigerants instead of CFCs/HCFCs, and the avoidance
                  of purchasing toxic materials and replacement by non-toxic materials. Serry also promotes bulk
                  buying of supplies using returnable containers, avoids single portion packs in restaurants, and
                  limit individual packaging of hygiene products in bed rooms.</p>  
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingEight">
              <h2 class="mb-0">
                <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                  <h5 class="">ECOLOGY</h5>
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus"></i>
                </button>
              </h2>
            </div>
            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
              <div class="card-body">
                <h6>SUPPORTING THE LOCAL ECOLOGY:</h6>
                <p>In partnership with the Hurghada Environment Protection and Conservation Association, Serry
                  utilizes its marine units and crew to collect waste from the surrounding islands and beaches.
                  Serry has been keen on enhancing the biodiversity of the ecology by using native plant species
                  where possible, drought tolerant planting which doesn’t require as much watering, and plant
                  species that can tolerate irrigation from treated backwater. Serry is also working on replacing
                  insecticides, weed killers, fungicides with organic fertilizers instead, and providing onsite
                  compost facilities to support landscaping.</p> 
                  
                  
                  <h6>PROTECTION OF ANIMALS &amp; ENDANGERED SPECIES:</h6>
                  <p>Serry has signed a protocol with the Egyptian Ministry of State for Environmental Affairs to
                    display all Red Sea Reserves Authority’s confiscated wild life in Serry’s purposely built non-profit
                    endangered species permanent exhibition to promote protection for endangered species. Serry
                    often hosts in its marine facilities the Red Sea Reserves Authority’s research team to conduct
                    research and experiments with the aid of Serry&#39;s marines team, in addition to offering the
                    Reserves Authority technical support offsite.</p>
              </div>
            </div>
          </div>


          <div class="card">
            <div class="card-header" id="headingNine">
              <h2 class="mb-0">
                <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                  <h5 class="">LOCAL COMMUNITY</h5>
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus"></i>
                </button>
              </h2>
            </div>
            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
              <div class="card-body">
                <p>SOCIAL DEVELOPMENT:</p>
                <p>Serry plays a role in serving the community in which it operates by sponsoring charitable events
                  to aid the disabled and disadvantaged, and by funding social activities. Team members are
                  encouraged to engage and commit part of their Time to help the local community through a
                  variety of charities and foundations, educational organizations, and similar institutions.</p>
                  
                <h6>ENCOURAGING CULTURAL DIALOGUE:</h6>
                <p>Serry has been developing a series of weekly cultural talks, debates, and events in Left Bank.
                  These weekly events have been receiving great responses and reviews due to its approach to
                  sensitive and often overseen topics such as self-expression through graffiti, assessing the
                  revolution&#39;s impact, minorities, and unprivileged areas communities around the country such
                  Siwa.</p>
                  
                <h6>PREVENTION OF BLINDNESS:</h6>
                <p>Serry has partnered with Misr El Kheir foundation to find and treat cases with functional
                  deterioration or loss of sight due to health conditions, environmental, or social factors. The
                  initiative targets cases that need surgical interference provide therapeutic medications for a
                  proper treatment, provide ophthalmic equipment essential for improving the visual acuity, and
                  rehabilitation. The indicative&#39;s goals are to help curable visually disabled cases to live normally,
                  raise preventive awareness about the diverse lesions causing eye diseases to the low-income
                  population in underserved areas.</p> 
              </div>
            </div>
          </div>


        </div>

      </div>


    </main>
    <!-- ==================== Main ==================== -->
@endsection

@push('custom-js-scripts')

@endpush
