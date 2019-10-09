<template>
  <div class="container">
    <div class="row pt-5">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Responsive Hover Table</h3>
            <div class="box-tools">
              <button class="btn btn-success pull-right" data-toggle="modal" data-target="#adduser">
                Add User
                <i class="fas fa-user-plus fa-fw"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Type</th>
                  <th>Created At</th>
                  <th>Modify</th>
                </tr>
                <tr v-for="(user, index) in users" :key="index">
                  <td>{{ user.id }}</td>
                  <td>{{user.name}}</td>
                  <td>{{user.email}}</td>
                  <td>
                    <span
                      class="label"
                      v-bind:class="[user.type=='admin' ? 'label-success' : 'label-danger']"
                    >{{user.type | capitalize}}</span>
                  </td>
                  <td>{{user.created_at | customDate}}</td>
                  <td>
                    <a href>
                      <i class="fas fa-edit green"></i>
                    </a>
                    <a href>
                      <i class="fas fa-trash red"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <div class="modal fade" id="adduser" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form @submit.prevent="createUser">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.name"
                  placeholder="Name"
                  type="text"
                  name="name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                />
                <has-error :form="form" field="name"></has-error>
              </div>
              <div class="form-group">
                <input
                  v-model="form.email"
                  placeholder="Email"
                  type="email"
                  name="email"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                />
                <has-error :form="form" field="email"></has-error>
              </div>
              <div class="form-group">
                <textarea
                  id="bio"
                  v-model="form.bio"
                  placeholder="Bio"
                  type="text"
                  name="bio"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('bio') }"
                ></textarea>
                <has-error :form="form" field="bio"></has-error>
              </div>
              <div class="form-group">
                <select
                  id="type"
                  v-model="form.type"
                  name="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('type') }"
                >
                  <option value>Select User Role</option>
                  <option value="admin">Admin</option>
                  <option value="standart">Standart</option>
                  <option value="author">Author</option>
                </select>
                <has-error :form="form" field="type"></has-error>
              </div>
              <div class="form-group">
                <input
                  v-model="form.password"
                  type="password"
                  placeholder="Password"
                  name="password"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('password') }"
                />
                <has-error :form="form" field="password"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      // Create a new form instance
      users: {},
      form: new Form({
        name: "",
        email: "",
        type: "",
        password: "",
        bio: "",
        photo: ""
      })
    };
  },
  methods: {
    loadUsers() {
      axios.get("api/user").then(({ data }) => (this.users = data.data));
    },
    createUser() {
      this.$Progress.start();
      this.form.post("api/user");
      Toast.fire({
          type: "success",
        title: "Signed in successfully"
      });
      this.$Progress.finish();
    }
  },
  created() {
    this.loadUsers();
  }
};
</script>
