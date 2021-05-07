import {
    ADD_ITEM,
    PULL_ITEM,
    SUGGEST_ITEMS
} from '../actions/lists.js';

const lists = (state, action) => {
    switch (action.type) {
        case ADD_ITEM:
            return [action.item, ...state];

        case PULL_ITEM:
            return state.filter(item => item.id !== parseInt(action.id));

        case SUGGEST_ITEMS:
            return state.map(item => {
                if (!item.name.includes(action.input)) {
                    item.display = 'none';
                }
                return item;
            });

        default:
            return state;
    }
}

export default lists;
