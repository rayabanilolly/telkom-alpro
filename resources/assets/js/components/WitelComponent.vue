<template>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-primary">
                        <div class="card-header">
                        	<b><i>Data Witel</i></b> &nbsp;
                        	<button class="btn btn-success btn-sm" v-on:click="formShow('create')">Tambah Data</button>
                        </div>
                        <div class="card-body">
                            <v-client-table :columns="columns" :data="witels" :options="options">
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
                    				<label for="name-regional" class="col-sm-4 col-form-label">Pilih Regional</label>
                    				<div class="col-sm-8">
                    					<select class="form-control" v-model="formData.regionalId" id="name-regional">
                    						<option 
                    							:value="regional.id" 
                    							:key="regional.id" 
                    							v-for="regional in regionals">
                    							{{ regional.name }}
                    						</option>
                    					</select>
                    				</div>
                    			</div>
                    			<div class="form-group row">
                    				<label for="name" class="col-sm-4 col-form-label">Nama Witel</label>
                    				<div class="col-sm-8">
                    					<input type="text" v-model="formData.name" class="form-control">
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
                formData: {},
                witels: [],
                regionals: [],
                columns: ['name', 'regional.name', 'opsi'],
                options: {
                    headings: {
                        'name': 'Nama Witel',
                        'regional.name': 'Regional',
                        'opsi': 'Aksi'
                    },
                    sortable: ['name', 'regional.name'],
                    filterable: ['name'],
                    pagination: {
                    	chunk:10, dropdown: false
                    }
                }
            }
        },
        methods: {
        	formShow(type, data = null)
        	{
        		if (data == null && type == 'create') {

        			this.formedit 	= false
        			this.formcreate = true
        			this.formData	= {}
        		}
        		else {

        			this.formcreate 			= false
        			this.formedit 				= true
        			this.formData 				= data
        			this.formData.regionalId 	= data.regional.id
        		}
        	},
        	deleteData(id) 
        	{
        		if (confirm('Yakin mau hapus data?')) 
        		{
        			this.loading = true
	        		axios.get('/witel-delete/' + id)
	        		.then(
	        			response => {
	        				this.getWitel();
	        				this.formedit = false
	        				this.formcreate = false
	        				this.loading = false;
	        				
	        				alert('Data berhasil dihabus!');
	        			}
	        		)
	        		.catch(
	        			(error) => console.log(error.message)
	        		)
        		}
        	},
        	saveForm()
        	{

        		this.loading = true
        		axios.post('/witel-save', this.formData)
        		.then(
        			response => {

        				if (this.formcreate == true) {
        					this.formData = {}
        					this.formcreate = false;
        					alert('Berhasil menambah data!');
        				}
        				else {
        					this.formedit = false;
        					alert('Berhasil merubah data!');
        				}

        				this.getWitel();
        				this.loading = false
        			}
        		)
        		.catch(
        			(error) => console.log(error.message)
        		)
        	},
        	getRegional()
        	{
        		axios.get('/bookingcontentregional')
				.then(
					response => {
						this.regionals = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
        	},
            getWitel() 
            {
				axios.get('/witel-get')
				.then(
					response => {
						this.witels = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			}
        },
        mounted() {
            console.log('Component mounted.');
			this.getRegional();
			this.getWitel();
        }
    }
</script>
