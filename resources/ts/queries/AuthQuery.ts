import { useMutation, useQuery } from 'react-query'
import { toast } from 'react-toastify'
import * as api from '../api/AuthAPI'
import { useAuth } from '../hooks/AuthContext'

const useUser = () => {
  return useQuery('users', api.getUser)
}

const useSignIn = () => {
  const { setIsAuth } = useAuth()

  return useMutation(api.signIn, {
    onSuccess: (user) => {
      if (user) {
        setIsAuth(true)
        toast.success('Login success.')
      }
    },
    onError: () => {
      toast.error('Login failed.')
    }
  })
}

const useSignOut = () => {
  const { setIsAuth } = useAuth()

  return useMutation(api.signOut, {
    onSuccess: (user) => {
      if (user) {
        setIsAuth(false)
      }
    },
    onError: () => {
      toast.error('Logout failed.')
    }
  })
}

export { useUser, useSignIn, useSignOut }
