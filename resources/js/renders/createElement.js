export function createRow() {
    return `
        <div className="row">
            <div className="col-12">
                <div className="card">
                    <div className="card-body">
                        <div className="container__wrapper">
                            <div className="row">
                                <div className="col-12">
                                    <div className="box">
                                        <div className="add-grid" data-toggle="modal" data-target="#modalEditHeader">
                                            <i className="fa fa-edit"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `
}
