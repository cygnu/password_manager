import * as api from '../api/AuthAPI'
import { useMutation, useQuery } from 'react-query'
import { toast } from 'react-toastify'

const useUser = () => {
  return useQuery('users', api.getUser)
}

const useSignIn = () => {
  return useMutation(api.signIn, {
    onSuccess: (user) => {
      console.log(user)
    },
    onError: () => {
      toast.error('Login failed.')
    }
  })
}

const useSignOut = () => {
  return useMutation(api.signOut, {
    onSuccess: (user) => {
      console.log(user)
    },
    onError: () => {
      toast.error('Logout failed.')
    }
  })
}

export { useUser, useSignIn, useSignOut }
