<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <form v-autoAjax v-row="row" @loading="loading" @success="onSuccess" method="post" :action="'/update/'+row.id" class="autoAjax">
                            <div class="form-group">
                                <label>nazov clanku</label>
                                <input name="name" class="form-control">
                                <strong>Pozor pri zmene nazvu clanku sa ti automaticky zmeni slug, ktory je v url adrese. Po refreshi nebude clanok existovat. (K tomu je v config/admin.php parameter sluggable_history, a vdaka tomu to bude fungovat aj na neexistujuce url. Stare sa presmeruju na nove.) Mozes vyskusat. zapol som ti to.</strong>
                            </div>
                            <div class="form-group">
                                <label>obsah clanku</label>
                                <textarea name="content" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>dalsie policko ktore sa neuklada do db ale validujeme ho</label>
                                <input name="author" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>obrazok</label>
                                <input name="image" type="file" class="form-control">
                            </div>
                            <button>{{ loading ? 'Odosielam' : 'Odoslat' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props : ['mojeDataZDatabazy'],
    data(){
        return {
            loading : false,
            row : window.mojRiadokZDatabazy,
        };
    },

    methods: {
        onSuccess(response){
            console.log('success response', response);

            alert('ok, pozri konzolu');
        },
    }
}
</script>
