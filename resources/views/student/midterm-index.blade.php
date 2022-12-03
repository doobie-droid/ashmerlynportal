<x-portal-layout>
    @section('style')
        <link href="{{asset('css/result.css')}}" rel="stylesheet">

    @endsection
    @section('content')
        <!--main content wrapper-->
        <div class="mcw ">
            <!--navigation here-->
            <!--main content view-->
            <div class="cv ">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10 table-responsive">
                        <table class="table table-bordered ">

                            <thead class="thead-dark">
                            <tr>
                                <th scope="row" colspan="13" class="text-center">
                      <br />FIRST TERM
                                    MIDTERM <br />
                                </th>
                            </tr>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">SUBJECT</th>
                                <th scope="col">ASS (5)</th>
                                <th scope="col">TEST (5)</th>
                                <th scope="col">CAT (10)</th>
                                <th scope="col">TOTAL (20)</th>
                                <th scope="col">PERCENTAGE</th>

                                <th scope="col">Grade</th>
                                <th scope="col">Remark</th>
                                <th scope="col">Teacher</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td></td>
                                <td></td>
                                <td>Mr. Ezike</td>
                            </tr>


                            <tr>
                                <th scope="row" style="height: 45px"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row" style="height: 45px"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row" style="height: 45px"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                            <tfooter>
                                <tr>
                                    <th scope="row" colspan="10" class="text-center">
                                        Student's Average: 90
                                    </th>
                                </tr>
                                <tr>
                                    <td scope="row" colspan="2">Class Average</td>
                                    <td colspan="2">95.6</td>
                                    <td colspan="2"><b>Total Score</b></td>
                                    <td colspan="2"></td>
                                    <td colspan="2">Principal:</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="10">
                                        Class Teacher's Remarks:
                                        <u>He is a clean, decent and well behaved boy</u>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="10">
                                        Principal's Remarks:
                                        <u>He is the best thing since sliced bread</u>
                                    </th>
                                </tr>
                                <tr>
                                    <td scope="row" colspan="2">Signature</td>
                                    <td colspan="3">
                                        <img src="/images/sign.webp" class="signatures" />
                                    </td>
                                    <td colspan="2">Date:</td>
                                    <td colspan="3">_________________________</td>
                                </tr>
                                <tr>
                                    <td scope="row" colspan="13">
                                        NOTE: THIS IS NOT AN OFFICIAL TRANSCRIPT, SEND A MESSAGE TO
                                        EXAMS AND RECORDS FOR YOUR OFFICIAL TRANSCRIPT
                                    </td>
                                </tr>
                            </tfooter>
                        </table>
                        <br /><br /><br />
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
        </div>

    @endsection
</x-portal-layout>
