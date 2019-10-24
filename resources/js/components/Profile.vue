<style>
.widget-user-header {
  background-position: center center;
  background-size: cover;
  height: 250px;
}
.box-widget {
  background: #f8fafc !important;
  margin: 25px 0;
}
.nav-tabs-custom {
  padding: 20px;
  margin-bottom: 20px;
  background: #fff;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  border-radius: 3px;
}
.nav-tabs-custom > .nav-tabs {
  margin: 0;
  border-bottom-color: #f4f4f4;
  border-top-right-radius: 3px;
  border-top-left-radius: 3px;
}
.nav-tabs-custom > .tab-content {
  background: #fff;
  padding: 10px;
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px;
}
.nav > li {
  float: left;
  position: relative;
  display: block;
}
.nav-tabs-custom > .nav-tabs > li {
  border-top: 3px solid transparent;
  margin-bottom: -2px;
  margin-right: 5px;
}
.nav-tabs-custom > .nav-tabs > li.active {
  border-top-color: #3c8dbc;
}
.tab-content > .tab-pane {
  display: none;
}
.tab-content > .active {
  display: block;
}

.nav-tabs-custom > .nav-tabs > li.active > a {
  border-top-color: transparent;
  border-left-color: #f4f4f4;
  border-right-color: #f4f4f4;
}
.nav-tabs-custom > .nav-tabs > li.active > a,
.nav-tabs-custom > .nav-tabs > li.active:hover > a {
  background-color: #fff;
  color: #444;
}
.nav-tabs-custom > .nav-tabs > li > a,
.nav-tabs-custom > .nav-tabs > li > a:hover {
  background: transparent;
  margin: 0;
}
.nav-tabs-custom > .nav-tabs > li > a {
  border-radius: 0;
}
.nav-tabs > li.active > a,
.nav-tabs > li.active > a:focus,
.nav-tabs > li.active > a:hover {
  cursor: default;
  background-color: #fff;
  border-bottom-color: transparent;
}
a:hover,
a:active,
a:focus {
  outline: none;
}
.nav > li > a:focus,
.nav > li > a:hover {
  text-decoration: none;
}
.nav > li > a {
  position: relative;
  display: block;
  padding: 10px 15px;
}
a {
  text-decoration: none;
}
.nav-tabs-custom > .nav-tabs > li > a {
  color: #444;
  border-radius: 0;
}
.col-sm-6,
.col-sm-12 {
  margin-bottom: 15px;
}
</style>
<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div
            class="widget-user-header bg-black"
            style="background: url('./img/gabala.png') center center;"
          >
            <h3 class="widget-user-username">Rashid Khitilov</h3>
            <h5 class="widget-user-desc">Web Developer</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle" src alt="User Avatar" />
          </div>
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">3,200</h5>
                  <span class="description-text">SALES</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">13,000</h5>
                  <span class="description-text">FOLLOWERS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">35</h5>
                  <span class="description-text">PRODUCTS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <div class="box box-widget">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class>
                <a href="#timeline" data-toggle="tab" aria-expanded="false">Timeline</a>
              </li>
              <li class="active">
                <a href="#settings" data-toggle="tab" aria-expanded="true">Settings</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane active" id="settings">
                <form class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="name" class="col-sm-2 control-label">Name</label>
                      <input
                        type="text"
                        name="name"
                        v-model="form.name"
                        class="form-control"
                        id="name"
                        placeholder="Name"
                      />
                    </div>
                    <div class="col-sm-6">
                      <label for="email" class="col-sm-2 control-label">Email</label>
                      <input
                        type="email"
                        name="email"
                        class="form-control"
                        id="email"
                        v-model="form.email"
                        placeholder="Email"
                      />
                    </div>
                    <div class="col-sm-6">
                      <label for="file" class="col-sm-2 control-label">Photo</label>
                      <input
                        type="file"
                        name="photo"
                        class="form-control"
                        id="file"
                        v-on:change="onImageChange"
                      />
                    </div>
                    <div class="col-sm-6">
                      <label for="inputPassport" class="col-sm-2 control-label">Passport</label>
                      <input
                        type="text"
                        name="passport"
                        class="form-control"
                        id="inputPassport"
                        placeholder="Passport"
                      />
                    </div>
                    <div class="col-sm-12">
                      <label for="bio" class="col-sm-2 control-label">Experience</label>
                      <textarea class="form-control" id="bio" v-model="form.bio" name="bio" placeholder="Bio"></textarea>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                      <button
                        type="submit"
                        class="btn btn-success"
                        @click.prevent="updateProfile"
                      >Update</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
        id: "",
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
    loadUser() {
      axios.get("api/profile").then(({ data }) => this.form.fill(data));
    },
    onImageChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      if (file["size"] < 500000) {
        let reader = new FileReader();
        let vm = this;
        reader.onload = e => {
          vm.form.photo = e.target.result;
        };
        console.log(file);
        reader.readAsDataURL(file);
      }else{
          Swal.fire("Failed!", "User Photo size is large.", "error");
      }
    },
    updateProfile() {
      this.$Progress.start();
      this.form
        .put("api/profile")
        .then(() => {
          Toast.fire({
            type: "success",
            title: "Updated successfully"
          });
          Fire.$emit("afterUpdated");
          this.form.reset();
        })
        .catch(() => {
          Swal.fire("Failed!", "User has not been updated .", "error");
          this.$Progress.fail();
        });
      this.$Progress.finish();
    }
  },
  mounted() {
    console.log("Component mounted.");
  },
  created() {
    this.loadUser();
    Fire.$on("afterUpdated", () => {
      this.loadUser();
    });
  }
};
</script>
