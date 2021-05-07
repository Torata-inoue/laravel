import React, { useContext } from "react";
import AppContext from '../contexts/AppContext';
import {PULL_ITEM} from '../actions/lists.js';

const List = ({item}) => {
    const { state, dispatch, options, setSelectedUser } = useContext(AppContext);

    const pickUser = e => {
        state.map(item => {
            if (typeof setSelectedUser === 'function' && item.id === parseInt(e.target.dataset.id)) {
                setSelectedUser(item);
            }
        });

        if (options.isClose) {
            const contents = document.querySelector('.list__contents');
            contents.style.display = 'none';
        }

        if (options.isPull) {
            dispatch({
                type: PULL_ITEM,
                id: e.target.closest('.list__contents--item').dataset.id
            });
        }
    }
    return (
        <li className="list__contents--item"　onClick={pickUser} data-id={item.id} style={{display: item.display}}>
            <div className="list__contents--label">
                <img className="list__contents--icon" src={item.icon} alt=""/>
                <span className="list__contents--text">{item.name}</span>
            </div>
        </li>
    )
}

export default List;
