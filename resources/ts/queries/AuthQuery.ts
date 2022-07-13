import * as api from '../api/AuthAPI'

const useUser = () => {
  return useQuery('users', api.getUser())
}
