import React, { Component } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';

class ProductsForm extends Component {
    constructor() {
        super()
        this.state = {
            'description': '',
            'category_id': '',
        }
    }

    render() {
        return (
            <div className="flex form-categoria">
                <div className="box50">
                    <form name="form-product">
                        <label>
                            <span className="label">DESCRIÇÃO</span>
                            <input className="radius5" type="text" name="description" value="" placeholder="NOME DA CATEGORIA" />
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