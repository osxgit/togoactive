<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    @include('layouts.admin.events.subheader')
    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <table id="achievements" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Reorder</th>
                            <th>ID</th>
                            <th>Icon</th>
                            <th>Titile</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($achievements as $achievement)
                        <tr>
                            <td><i class="fa fa-bars"></td>
                            <td>{{ $achievement->id }}</td>
                            <td><i class="fa fa-file"></td>
                            <td>{{ $achievement->title }}</td>
                            <td>{{ $achievement->description }}</td>
                            <td>{{ $achievement->type }}</td>
                            <td>{{ $achievement->level }}</td>
                            <td><i class="fa fa-ellipsis-v"></td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script>
        jQuery.noConflict();

        jQuery(document).ready(function() {
            jQuery('#achievements').DataTable();
        });
    </script>
</x-app-layout>
