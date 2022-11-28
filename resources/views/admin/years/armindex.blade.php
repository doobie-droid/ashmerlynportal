<x-portal-layout>

    @section("content")

        <div class="col-lg-6">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#home1" role="tab" data-toggle="tab">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#profile1" role="tab" data-toggle="tab">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#messages1" role="tab" data-toggle="tab">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#settings1" role="tab" data-toggle="tab">Settings</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <br>
                <div role="tabpanel" class="tab-pane active" id="home1">
                    <h4>Home</h4>
                    <p>
                        1. These Bootstrap 4 Tabs work basically the same as the Bootstrap 3.x tabs.
                        <br>
                        <br>
                        <button class="btn btn-primary-outline btn-lg">Wow</button>
                    </p>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile1">
                    <h4>Pro</h4>
                    <p>
                        2. Tabs are helpful to hide or collapse some addtional content.
                    </p>
                </div>
                <div role="tabpanel" class="tab-pane" id="messages1">
                    <h4>Messages</h4>
                    <p>
                        3. You can really put whatever you want into the tab pane.
                    </p>
                </div>
                <div role="tabpanel" class="tab-pane" id="settings1">
                    <h4>Settings</h4>
                    <p>
                        4. Some of the Bootstrap 3.x components like well and panel have been dropped for the new card component.
                    </p>
                </div>
            </div>
        </div>
    @endsection
</x-portal-layout>
