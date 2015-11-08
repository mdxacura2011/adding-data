function del(id) 
        {
            if (confirm("Вы действительно хотите удалить запись?"))
            {
                location.href="?option=delete&id=" + id;   
            }
        }