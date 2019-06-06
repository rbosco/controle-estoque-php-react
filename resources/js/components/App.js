import React, { Component, Fragment } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import Header from './Header';
import ProductsList from './ProductsList';

export default class App extends Component {
    render() {
        return (
            <BrowserRouter>
                <Fragment>
                    <Header />
                    <Switch>
                        <Route exact path='/' component={ProductsList} />
                    </Switch>
                </Fragment>
            </BrowserRouter>
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
