<style>
    #table_inquiry {
        cursor: pointer;
    }

    #table_inquiry th:nth-child(2),
    #table_inquiry td:nth-child(2) {
        width: 20%;
    }

    #table_inquiry th:nth-child(3),
    #table_inquiry td:nth-child(3) {
        width: 65%;
    }

    #table_inquiry th:nth-child(4),
    #table_inquiry td:nth-child(4) {
        text-align: center;
        width: 12%;
    }

    #table_inquiry td:nth-child(1),
    #table_inquiry td:nth-child(5) {
        display: none;
    }

    .short {
        white-space: nowrap;
        width: 500px;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span id="date"></span></li>
                <li class="breadcrumb-item"><span id="clock"></span></li>
            </ol>

            <div class="card">
                <div class="card-header" style="background:#2d3436; color: #fff;">
                    <i class="fas fa-archive me-2"></i>Inquiry Reports
                </div>
                <div class="card-body">
                    <a href="<?= base_url('main/exportInquiry')?>" class="btn btn-secondary btn-sm mb-2"><i class="bi bi-cloud-download-fill me-2"></i>Extract Data</a>
                    <div class="table-reponsive">
                        <table class="table table-hover" width="100%" cellspacing="0" id="table_inquiry">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>Inbox</th>
                                    <th></th>
                                    <th></th>
                                    <th style="display: none;"></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </main>