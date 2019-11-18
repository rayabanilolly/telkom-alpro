<template>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-white bg-info">
                        <div class="card-header"><b><i>Instruksi</i></b></div>
                        <div class="card-body">
                            <li>
                                Isi data odc sesuai urutan, mulai dari regional, witel, sto, dst. Untuk memfilter pencarian data odc.
                            </li>
                            <li>
                                Isi form odc dengan cermat, mulai dari nama, spesifikasi, mitra, dst.
                            </li>
                            <li>
                                Jika ingin menambah odc baru harus mengisi data odc terlebih dahulu, kemudian form odc.
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="height: 25px !important"></div>
            <div class="row">
                <div class="col-md-7">
                    <div class="card border-primary">
                        <div class="card-header"><b><i>Data ODP</i></b></div>
                        <div class="card-body">
                            <form @submit.prevent="allOdp">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="regional">Regional</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control form-control-sm" id="regional" name="regional" v-model="regional" v-on:change="allWitel()">
                                                <option :value="0">Pilih Regional</option>
                                                <option :value="regional.id" :key="regional.id" v-for="regional in regionals">{{ regional.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="witel">Witel</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control form-control-sm" id="witel" name="witel" v-model="witel" v-on:change="allSto()">
                                                <option :value="0">Pilih Witel</option>
                                                <option :value="witel.id" :key="witel.id" v-for="witel in witels">{{ witel.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="sto">STO</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control form-control-sm" id="sto" name="sto" v-model="sto" @change="allOdc()">
                                                <option :value="0">Pilih STO</option>
                                                <option :value="sto.id" :key="sto.id" v-for="sto in stos">{{ sto.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="odc">ODC</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control form-control-sm" id="odc" name="odc" v-model="odc">
                                                <option :value="0">Pilih ODC</option>
                                                <option :value="odc.id" :key="odc.id" v-for="odc in odcs">{{ odc.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md" style="text-align: right;">
                                            <button type="submit" class="btn btn-primary btn-sm">Tampilkan Odc &nbsp<i class="far fa-arrow-alt-circle-down"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div v-if="loading">
                                <label><i>Menunggu ...</i></label>
                            </div>
                            <div v-if="done">
                                <div class="row">
                                    <div class="col-md-12">
                                        <v-client-table :columns="columns" :data="odps" :options="options">
                                            <span slot="opsi" slot-scope="{row}">
                                                <button class="btn btn-secondary btn-sm" v-on:click="formodpshow = true; showOdp(row)">EDIT <i class="fas fa-edit"></i></button>
                                            </span>
                                        </v-client-table>       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5" v-if="formodpshow === true">
                    <div class="card border-danger">
                        <div class="card-header"><b><i>Form ODP</i></b></div>
                        <div class="card-body">
                            <!-- <form> -->
                                <input type="hidden" id="typeform" name="typeform" v-model="typeform">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="odc">Nama ODP</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="Nama ODP" name="name" id="name" v-model="odp.name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="frame">Frame</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="Label ODP" name="frame" id="frame" v-model="odp.frame">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="power">Power</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="Power ODP" name="power" id="power" v-model="odp.power">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="distribusi">Distribusi</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="Nama ODP" disabled name="distribusi" id="distribusi" v-model="odp.distribution.name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="odc">ODC</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="Nama ODP" disabled name="odc" id="odc" v-model="odp.odc.name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="panel-in">Panel In</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="Panel In" name="panel-in" id="panel-in" v-model="odp.panel_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="port-in">Port In</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="Port In" name="port-in" id="port-in" v-model="odp.port_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="panel-out">Panel Out</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="Panel Out" name="panel-out" id="panel-out" v-model="odp.panel_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="port-out">Port Out</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="Port Out" name="port-out" id="port-out" v-model="odp.port_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="latitude">Latitude</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="Latitude" name="latitude" id="latitude" v-model="odp.latitude">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="longitude">Longitude</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="Longitude" name="longitude" id="longitude" v-model="odp.longitude">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="regional">Regional</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="Regional" disabled name="regional" id="regional" v-model="odp.regional.name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="witel">Witel</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="Witel" disabled name="witel" id="witel" v-model="odp.witel.name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="sto">STO</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm" placeholder="STO" disabled name="sto" id="sto" v-model="odp.sto.name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="mitra">Mitra</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="form-control form-control-sm" id="mitra" name="mitra" v-model="odp.mitra_id">
                                                <option :value="0">Pilih Mitra</option>
                                                <option :value="mitra.id" :key="mitra.id" v-for="mitra in mitras">{{ mitra.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="statuscons">S. Pembangunan</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="form-control form-control-sm" id="statuscons" name="statuscons" v-model="odp.statuscons_id">
                                                <option :value="0">Pilih Status</option>
                                                <option :value="statuscons.id" :key="statuscons.id" v-for="statuscons in statusconss">{{ statuscons.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="statusinv">S. Inventori</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="form-control form-control-sm" id="statusinv" name="statusinv" v-model="odp.statusinv_id" v-on:change="">
                                                <option :value="0">Pilih Mitra</option>
                                                <option :value="statusinv.id" :key="statusinv.id" v-for="statusinv in statusinvs">{{ statusinv.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md" style="text-align: right;">
                                            <button type="button" class="btn btn-success btn-sm" v-if="typeform === 'edit'" v-on:click="editOdp()">Simpan &nbsp<i class="fas fa-save"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" v-on:click="formodpshow = false">Batal &nbsp<i class="fas fa-ban"></i></button>
                                        </div>
                                    </div>
                                </div>
                            <!-- </form> -->
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
                typeform: 'edit',
                formodpshow: false,
                loading: false,
                done: false,
                regionals: [],
                regional: '',
                witels: [],
                witel: '',
                stos: [],
                sto: '',
                id: '',
                odcs: [],
                odc: '',
                odps: [],
                odp: {},
                mitra: '',
                projek: '',
                columns: ['name', 'distribution.name', 'mitra.name', 'statuscons.name', 'statusinv.name', 'opsi'],
                small: true,
                options: {
                    headings: {
                        name: 'Nama',
                        'distribution.name': 'Distribusi',
                        'mitra.name': 'Mitra',
                        'statuscons.name': 'Status Pembangunan',
                        'statusinv.name': 'Keterangan',
                        opsi: 'Opsi'
                    },
                    sortable: ['name', 'statusinv.name'],
                    filterable: ['name'],
                    pagination: {chunk:10, dropdown: false}
                }
            }
        },
        methods: {
            allRegional() {
                axios.get('/alproodccontentregional')
                .then(
                    response => {
                        this.regionals = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                );
            },
            allWitel() {
                axios.get('/alproodccontentwitel/'+ this.regional)
                .then(
                    response => {
                        this.witels = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                );
            },
            allSto() {
                axios.get('/alproodccontentsto/'+ this.witel)
                .then(
                    response => {
                        this.stos = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                );
            },
            allOdc() {
                axios.get(`/getodc/${this.sto}`)
                .then(
                    response => {
                        this.odcs = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                );
            },
            allOdp() {
                if(this.odc == ''){
                    alert('ODC tidak boleh kosong');

                    this.loading = false;
                    this.done = false;
                }
                else{
                    this.loading = true;
                    this.done = false;

                    axios.get(`/getodp/${this.odc}`)
                    .then(
                        response => {
                            this.loading = false;
                            this.done = true;
                            this.odps = response.data.data
                        }
                    )
                    .catch(
                        (error) => console.log(error.message)
                    );
                }
            },
            // allOdcSpec() {
            //     axios.get('/alproodccontentodcspec')
            //     .then(
            //         response => {
            //             this.odcspecs = response.data.data
            //         }
            //     )
            //     .catch(
            //         (error) => console.log(error.message)
            //     );
            // },
            allTypeProj() {
                axios.get('/alproodccontenttypeproj')
                .then(
                    response => {
                        this.typeprojects = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                );
            },
            allStatusCons() {
                axios.get('/alproodccontentstatuscons')
                .then(
                    response => {
                        this.statusconss = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                );
            },
            allStatusInv() {
                axios.get('/alproodccontentstatusinv')
                .then(
                    response => {
                        this.statusinvs = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                );
            },
            allMitra() {
                axios.get('/alproodccontentmitra')
                .then(
                    response => {
                        this.mitras = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                );
            },
            allMitra() {
                axios.get('/alproodccontentmitra')
                .then(
                    response => {
                        this.mitras = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                );
            },
            showOdp(row) {
                
                this.odp = row
                this.formodpshow = true

            },
            editOdp() {
                this.loading = true

                axios.post(`editodp`, this.odp)
                .then(
                    response => {
                        this.allOdp()
                        this.loading = false
                        alert('data berhasil diubah')
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                )
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.allRegional();
            // this.allOdcSpec();
            this.allTypeProj();
            this.allStatusInv();
            this.allStatusCons();
            this.allMitra();
        }
    }
</script>