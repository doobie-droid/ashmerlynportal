<x-portal-layout>
    @section('styles')
        <style>
            .project-tab {
                padding: 10%;
                margin-top: -8%;
            }

            .project-tab #tabs {
                background: #007b5e;
                color: #eee;
            }

            .project-tab #tabs h6.section-title {
                color: #eee;
            }

            .project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
                color: #0062cc;
                background-color: transparent;
                border-color: transparent transparent #f3f3f3;
                border-bottom: 3px solid !important;
                font-size: 16px;
                font-weight: bold;
            }

            .project-tab .nav-link {
                border: 1px solid transparent;
                border-top-left-radius: .25rem;
                border-top-right-radius: .25rem;
                color: #0062cc;
                font-size: 16px;
                font-weight: 600;
            }

            .project-tab .nav-link:hover {
                border: none;
            }

            .project-tab thead {
                background: #f3f3f3;
                color: #333;
            }

            .project-tab a {
                text-decoration: none;
                color: #333;
                font-weight: 600;
            }
        </style>
    @endsection
    @section("content")
        <section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if($classes)

                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    @foreach($classes as $class)
                                        @if(count($class->subjectTeacher)>0)
                                            @foreach($class->subjectTeacher as $subject)
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                           href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{'Year '.auth()->user()->getYearName($subject->pivot->year_id).' '.$subject->name}}</a>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content mobile-overflow" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                     aria-labelledby="nav-home-tab">
                                    <table class="table" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Employer</th>
                                            <th>Awards</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="#">Work 1</a></td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 2</a></td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 3</a></td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endsection
    @section('scripts')

    @endsection
</x-portal-layout>
