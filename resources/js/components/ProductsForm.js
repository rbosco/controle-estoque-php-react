import React, { Component } from 'react';
import axios from 'axios';

class ProductsForm extends Component {
    constructor() {
        super()
        this.state = {
            description: '',
            category_id: '',
        }
    }

    handleFieldChange(event) {
        this.setState({
            description: event.target.value
        });
    }

    handleSubmit(event) {
        event.preventDefault();

        const products = {
            description: this.state.description,
        }

        axios.post('/api/v1/manter-produto', products).then(response => {
            //clear form input
            this.setState({
                description: '',
            });
            console.log(response);
        }).catch(error => {
            this.setState({
                errors: error.response.data.errors
            });
        });
    }

    render() {
        return (
            <div className="flex form-categoria">
                <div className="box50">
                    <form name="form-product" onSubmit={this.handleSubmit}>
                        <label>
                            <span className="label">DESCRIÇÃO</span>
                            <input className="radius5" type="text" name="description" value={this.state.description} onChange={this.handleFieldChange} placeholder="NOME DA CATEGORIA" />
                        </label>
                        <div className="actions">
                            <button type="submit" className="btn btn-info radius5"><i className="fas fa-save"></i>Salvar</button>
                            <button type="button" className="btn btn-danger radius5 btn_delete"><i className="fas fa-trash-alt"></i>Excluir</button>
                        </div>
                    </form>
                </div>
            </div>
        )
    }
}

export default ProductsForm;