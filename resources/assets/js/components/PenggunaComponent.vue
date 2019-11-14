<template>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-primary">
                        <div class="card-header">
                            <b><i>Data Pengguna</i></b> &nbsp;
                            <button class="btn btn-success btn-sm" v-on:click="formShow('create')">Tambah Data</button>
                        </div>
                        <div class="card-body">
                            <v-client-table :columns="columns" :data="users" :options="options">
                                <span slot="opsi" slot-scope="{row}">
                                    <div class="button-group">
                                        <button class="btn btn-primary btn-sm" v-on:click="formShow('edit', row)">
                                            Edit <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" v-on:click="deleteData(row.id)">
                                            Hapus <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </span>
                            </v-client-table>                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6" v-if="formedit == true || formcreate == true">
                    <div class="card border-primary">
                        <div class="card-header" v-if="formedit == true"><b><i>Edit Data</i></b></div>
                        <div class="card-header" v-if="formcreate == true"><b><i>Tambah Data</i></b></div>
                        <div class="card-body">
                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" v-model="formData.name" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">NIK</label>
                                    <div class="col-sm-8">
                                        <input type="text" v-model="formData.nik" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" v-model="formData.email" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Mitra</label>
                                    <div class="col-sm-8">
                                        <select v-model="formData.mitra_id" class="form-control form-control-sm form-control-sm">
                                            <option 
                                                v-for="partner in partners" 
                                                :value="partner.id" 
                                                :key="partner.id">
                                                {{ partner.name }}
                                            </option>
                                            <option :value="add">Buat Baru</option>
                                        </select>
                                    </div>
                                </div>
                                <div v-if="formData.mitra_id === 'add'" class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Nama Mitra</label>
                                    <div class="col-sm-8">
                                        <input type="text" v-model="formData.mitra_name" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" v-model="formData.password" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" v-model="formData.repassword" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Hak Akses</label>
                                    <div class="col-sm-8">
                                        <select v-model="formData.level" class="form-control form-control-sm form-control-sm">
                                            <option value="1">Admin</option>
                                            <option value="2">Manajer</option>
                                            <option value="3">Drafter</option>
                                            <option value="4">Teknisi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button :disabled="loading == true" v-on:click="saveForm()" class="btn btn-primary">
                                        <span v-if="loading == false && formcreate == true">Tambah</span>
                                        <span v-if="loading == false && formedit == true">Ubah</span>

                                        <span v-if="loading == true">Loading...</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        data() {
            return {
                loading: false,
                done: false,
                formedit: false,
                formcreate: false,
                typeform: null,
                formData: {
                    mitra: {}
                },
                users: [],
                partners: [],
                columns: ['name', 'nik', 'email', 'mitra.name', 'level', 'opsi'],
                options: {
                    headings: {
                        name: 'Nama',
                        nik: 'NIK',
                        email: 'Email',
                        'mitra.name' : 'Nama Mitra',
                        level: 'Hak Akses',
                        opsi: 'Aksi'
                    },
                    sortable: ['name'],
                    filterable: ['name'],
                    pagination: {chunk:10, dropdown: false}
                }
            }
        },
        methods: {
            formShow(type, data = null)
            {
                if (data == null && type == 'create') {

                    this.formedit   = false
                    this.formcreate = true
                    this.formData   = {}
                }
                else {

                    this.formcreate = false
                    this.formedit   = true
                    this.formData   = data;
                }
            },
            deleteData(id) 
            {
                if (confirm('Yakin mau hapus data?')) 
                {
                    this.loading = true
                    axios.get('/users-delete/' + id)
                    .then(
                        response => {
                            alert('Data berhasil dihabus!');
                            this.allUsers();
                            this.loading = false;
                        }
                    )
                    .catch(
                        (error) => console.log(error.message)
                    )
                }
            },
            saveForm()
            {
                if (this.formData.password !== this.formData.repassword) {
                    return alert('Password dan Konrimasi Password tidak sama!');
                }

                this.loading = true
                axios.post('/users-save', this.formData)
                .then(
                    response => {

                        if (this.formcreate == true) {
                            alert('Berhasil menambah data!');
                            this.formData = {}
                        }
                        else {
                            alert('Berhasil merubah data!');
                        }

                        this.allUsers();
                        this.loading = false
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                )
            },
            allUsers() 
            {
                axios.get('/users-get')
                .then(
                    response => {
                        this.users = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                );
            },
            allPartners() 
            {
                axios.get('/mitra-get')
                .then(
                    response => {
                        this.partners = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                );
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.allPartners();
            this.allUsers();
        }
    }
</script>
