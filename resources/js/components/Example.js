import React from 'react';
import ReactDOM from 'react-dom';

function Example() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header" style={{textAlign:'right'}}>تغییر گذرواژه</div>

                        <div className="card-body">
                            <form action="/change" method="get">
                                <div className="form-group row">
                                    <label htmlFor="new" className="col-md-4 col-form-label text-md-right"> گذرواژه
                                        جدید</label>

                                    <div className="col-md-6">
                                        <input id="password" type="password" className="form-control " name="password"
                                               required autoComplete="new-password"/>
                                    </div>
                                </div>
                                <div className="form-group row">
                                    <label htmlFor="password-confirm" className="col-md-4 col-form-label text-md-right">تایید
                                        گذرواژه</label>

                                    <div className="col-md-6">
                                        <input id="password-confirm" type="password" className="form-control"
                                               name="password_confirmation" autoComplete="new-password"/>
                                    </div>
                                </div>
                                <input style={{marginLeft:'50%'}} className="btn btn-success" type="submit" value="ثبت"/>
                                    <div id="btn-danger" style={{float: 'left'}}>
                                        <a className="btn btn-danger" href="/home">انصراف</a>

                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
