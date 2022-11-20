<style>
    #table_inquiry th:nth-child(1) {
        width: 20%;
    }

    #table_inquiry th:nth-child(2) {
        width: 65%;
    }

    #table_inquiry th:nth-child(3) {
        width: 12%;
    }

    #table_inquiry td:nth-child(3) {
        text-align: center;
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
                    <button class="btn btn-secondary btn-sm mb-2"><i class="bi bi-cloud-download-fill me-2"></i>Extract Data</button>
                    <div class="table-reponsive">
                        <table class="table table-hover" width="100%" cellspacing="0" id="table_inquiry">
                            <thead>
                                <tr>
                                    <th>Inbox</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-user-edit me-2"></i>
                                        <span class="open-inbox"><a href="view_inquiry.html">Carlo Cano</a></span>
                                    </td>
                                    <td>
                                        <span class="open-inbox"><a href="view_inquiry.html">
                                                Subject: Lawfirm consultation booking appointment.....
                                            </a></span>
                                    </td>
                                    <td>Tue Nov 15, 2022</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-user-edit me-2"></i>
                                        <span class="open-inbox"><a href="view_inquiry.html">Juan Dela Cruz</a></span>
                                    </td>
                                    <td>
                                        <span class="open-inbox"><a href="view_inquiry.html">
                                                Subject: Lawfirm consultation booking appointment.....
                                            </a></span>
                                    </td>
                                    <td>Tue Nov 15, 2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </main>