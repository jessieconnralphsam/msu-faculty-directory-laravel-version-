<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('update.faculty', ['id' => $faculty->facultyid]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="col-form-label"><strong>First Name:</strong></label>
                        <input type="text" class="form-control" id="firstname" name="first_name" value="{{ $faculty->first_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="middlename" class="col-form-label"><strong>Middle Initial:</strong></label>
                        <input type="text" class="form-control" id="middlename" name="middle_name" value="{{ $faculty->middle_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="col-form-label"><strong>Last Name:</strong></label>
                        <input type="text" class="form-control" id="lastname" name="last_name" value="{{ $faculty->last_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="suffix" class="col-form-label"><strong>Suffix:</strong></label>
                        <input type="text" class="form-control" id="suffix" name="suffix" value="{{ $faculty->suffix }}">
                    </div>
                    <div class="mb-3">
                        <label for="suffix" class="col-form-label"><strong>Google Scholar Link:</strong></label>
                        <input type="text" class="form-control" id="scholar" name="scholar" value="{{ $faculty->google_scholar_link }}">
                    </div>
                    <div class="mb-3">
                        <label for="suffix" class="col-form-label"><strong>Specialization:</strong></label>
                        <input type="text" class="form-control" id="specialization" name="specialization" value="{{ $faculty->specialization }}">
                    </div>
                    <div class="mb-3">
                        <label for="suffix" class="col-form-label"><strong>Research Interest:</strong></label>
                        <input type="text" class="form-control" id="research" name="research" value="{{ $faculty->specialization }}">
                    </div>
                    <div class="mb-3">
                        <label for="suffix" class="col-form-label"><strong>Google Scholar Link:</strong></label>
                        <input type="text" class="form-control" id="scholar" name="scholar" value="{{ $faculty->google_scholar_link }}">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="col-form-label"><strong>Photo:</strong></label>
                        <input type="file" accept="image/jpeg" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label"><strong>Email:</strong></label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $faculty->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="college" class="col-form-label"><strong>College:</strong></label><br>
                        <p>{{ $faculty->college->college_name}}</p>
                    </div>
                    <div class="mb-3">
                        <label for="Department" class="col-form-label"><strong>Department</strong>:</label><br>
                        <p>{{ $faculty->department->department_name }}</p>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
