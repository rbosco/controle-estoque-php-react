import axios from 'axios';
import React, { Component, Fragment } from 'react';
import { Link } from 'react-router-dom';
import ProductsForm from './ProductsForm';

class ProductsList extends Component {
    constructor() {
        super()
        this.state = {
            products: []
        }
    }

    componentDidMount() {
        axios.get('/api/v1/listar-produto').then(response => {
            this.setState({
                products: response.data.listProducts,
            });
        });
    }

    render() {
        const { products } = this.state;
        return (
            <Fragment>
                 <ProductsForm />
                <div className="product-list" >
                    <table className="table" width="100%">
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Categoria</td>
                                <td>Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            {products.map(product => (
                                <tr key={product.id}>
                                    <td>{product.description}</td>
                                    <td>{product.category_id}</td>
                                    <td><Link className="btn-icon btn-warning radius50 btn_edit" to={`/${project.id}`}><i className="fas fa-pencil-alt"></i></Link><Link className="btn-icon btn-danger radius50 btn_delete" data-action="remover-produto" to={`/${project.id}`}><i className="fas fa-trash-alt"></i></Link></td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            </Fragment>
        )
    }
}

export default ProductsList;