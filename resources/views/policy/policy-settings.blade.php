@extends('layouts.master-layout')
@section('title')
    Policy Settings
@endsection

@section('current-page')
    Policy Settings
@endsection

@section('breadcrumb-current-page')
    Policy Settings
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Vertical Nav Pill</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-xxl-4 col-sm-4">
                            <div class="nav flex-column nav-pills mb-3">
                                <a href="#v-pills-home" data-toggle="pill" class="nav-link active show">Home</a>
                                <a href="#v-pills-profile" data-toggle="pill" class="nav-link">Profile</a>
                                <a href="#v-pills-messages" data-toggle="pill" class="nav-link">Messages</a>
                                <a href="#v-pills-settings" data-toggle="pill" class="nav-link">Settings</a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-xxl-8 col-sm-8">
                            <div class="tab-content">
                                <div id="v-pills-home" class="tab-pane fade active show">
                                    <p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis
                                        et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt
                                        minim occaecat.
                                    </p>
                                </div>
                                <div id="v-pills-profile" class="tab-pane fade">
                                    <p>Culpa dolor voluptate do laboris laboris irure reprehenderit id incididunt duis pariatur mollit aute magna pariatur consectetur. Eu veniam duis non ut dolor deserunt commodo et minim in quis laboris ipsum
                                        velit id veniam. Quis ut consectetur adipisicing officia excepteur non sit. Ut et elit aliquip labore Lorem enim eu. Ullamco mollit occaecat dolore ipsum id officia mollit qui esse anim eiusmod do sint
                                        minim consectetur qui.
                                    </p>
                                </div>
                                <div id="v-pills-messages" class="tab-pane fade">
                                    <p>Fugiat id quis dolor culpa eiusmod anim velit excepteur proident dolor aute qui magna. Ad proident laboris ullamco esse anim Lorem Lorem veniam quis Lorem irure occaecat velit nostrud magna nulla. Velit
                                        et et proident Lorem do ea tempor officia dolor. Reprehenderit Lorem aliquip labore est magna commodo est ea veniam consectetur.</p>
                                </div>
                                <div id="v-pills-settings" class="tab-pane fade">
                                    <p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet
                                        qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
